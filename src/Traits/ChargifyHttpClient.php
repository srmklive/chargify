<?php

namespace Srmklive\Chargify\Traits;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\ClientException as HttpClientException;
use Psr\Http\Message\StreamInterface;
use RuntimeException;

trait ChargifyHttpClient
{
    /**
     * Http Client class object.
     *
     * @var HttpClient
     */
    private $client;

    /**
     * Http Client configuration.
     *
     * @var array
     */
    private $httpClientConfig;

    /**
     * Chargify API URL.
     *
     * @var string
     */
    private $apiUrl;

    /**
     * Chargify API Endpoint.
     *
     * @var string
     */
    private $apiEndPoint;

    /**
     * Http Client request body parameter name.
     *
     * @var string
     */
    private $httpBodyParam;

    /**
     * Request type.
     *
     * @var string
     */
    protected $verb = 'post';

    /**
     * Validate SSL details when creating HTTP client.
     *
     * @var bool
     */
    protected $validateSSL;

    /**
     * Set curl constants if not defined.
     *
     * @return void
     */
    protected function setCurlConstants()
    {
        $constants = [
            'CURLOPT_SSLVERSION'        => 32,
            'CURL_SSLVERSION_TLSv1_2'   => 6,
            'CURLOPT_SSL_VERIFYPEER'    => 64,
            'CURLOPT_SSLCERT'           => 10025,
        ];

        foreach ($constants as $key => $value) {
            if (!defined($key)) {
                define($key, $constants[$key]);
            }
        }
    }

    /**
     * Function to initialize/override Http Client.
     *
     * @param \GuzzleHttp\Client|null $client
     *
     * @return void
     */
    public function setClient($client = null)
    {
        if ($client instanceof HttpClient) {
            $this->client = $client;

            return;
        }

        $this->client = new HttpClient([
            'curl' => $this->httpClientConfig,
        ]);
    }

    /**
     * Function to set Http Client configuration.
     *
     * @return void
     */
    protected function setHttpClientConfiguration()
    {
        $this->setCurlConstants();

        $this->httpClientConfig = [
            CURLOPT_SSLVERSION     => CURL_SSLVERSION_TLSv1_2,
            CURLOPT_SSL_VERIFYPEER => $this->validateSSL,
        ];

        // Initialize Http Client
        $this->setClient();
    }

    /**
     * Perform Chargify API request & return response.
     *
     * @throws \Throwable
     *
     * @return StreamInterface
     */
    private function makeHttpRequest()
    {
        try {
            $this->options['headers'] = [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Basic '.base64_encode($this->config['api_key']),
            ];

            return $this->client->{$this->verb}(
                "{$this->apiUrl}{$this->apiEndPoint}",
                $this->options
            )->getBody();
        } catch (HttpClientException $e) {
            throw new RuntimeException($e->getRequest()->getBody().' '.$e->getResponse()->getBody());
        }
    }

    /**
     * Function To Perform Chargify API Request.
     *
     * @param bool $decode
     *
     * @throws \Throwable
     *
     * @return array|StreamInterface|string
     */
    private function doChargifyRequest($decode = true)
    {
        try {
            // Perform PayPal HTTP API request.
            $response = $this->makeHttpRequest();

            return ($decode === false) ? $response->getContents() : \GuzzleHttp\json_decode($response, true);
        } catch (RuntimeException $t) {
            $message = collect($t->getMessage())->implode('\n');
        }

        return [
            'type'    => 'error',
            'message' => $message,
        ];
    }
}
