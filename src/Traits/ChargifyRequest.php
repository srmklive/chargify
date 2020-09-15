<?php

namespace Srmklive\Chargify\Traits;

use RuntimeException;

trait ChargifyRequest
{
    use ChargifyHttpClient;
    use ChargifyAPI;

    /**
     * Chargify API mode to be used.
     *
     * @var string
     */
    public $mode;

    /**
     * Chargify API configuration.
     *
     * @var array
     */
    private $config;

    /**
     * Default currency for Chargify.
     *
     * @var string
     */
    protected $currency;

    /**
     * Additional options for Chargify API request.
     *
     * @var array
     */
    protected $options;

    /**
     * Set Chargify API Credentials.
     *
     * @param array $credentials
     *
     * @throws \RuntimeException
     *
     * @return void
     */
    public function setApiCredentials($credentials)
    {
        if (empty($credentials)) {
            throw new RuntimeException('Empty configuration provided. Please provide valid configuration for Chargify API.');
        }

        // Setting Default Chargify Mode If not set
        $this->setApiEnvironment($credentials);

        // Set API configuration for the Chargify provider
        $this->setApiProviderConfiguration($credentials);

        // Set default currency.
        $this->setCurrency($credentials['currency']);

        // Set Http Client configuration.
        $this->setHttpClientConfiguration();
    }

    /**
     * Function to set currency.
     *
     * @param string $currency
     *
     * @throws \RuntimeException
     *
     * @return $this
     */
    public function setCurrency($currency = 'USD')
    {
        $allowedCurrencies = ['USD', 'GBP', 'CAD', 'AUD', 'NZD', 'SGD', 'ZAR', 'EUR', 'DKK', 'SEK', 'NOK', 'HKD', 'MYR', 'JPY', 'CHF', 'INR', 'PLN', 'CZK', 'RUB', 'BRL', 'PHP', 'RON', 'MXN', 'CNY', 'ILS', 'SAR', 'AED', 'ARS', 'CLP'];

        // Check if provided currency is valid.
        if (!in_array($currency, $allowedCurrencies, true)) {
            throw new RuntimeException('Currency is not supported by Chargify.');
        }

        $this->currency = $currency;

        return $this;
    }

    /**
     * Return the set currency.
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Function To Set Chargify API Configuration.
     *
     * @param array $config
     *
     * @throws Exception
     */
    private function setConfig(array $config = [])
    {
        $api_config = function_exists('config') ? config('chargify') : $config;

        // Set Api Credentials
        $this->setApiCredentials($api_config);
    }

    /**
     * Set API environment to be used by Chargify.
     *
     * @param array $credentials
     *
     * @return void
     */
    private function setApiEnvironment($credentials)
    {
        $this->mode = 'live';

        if (!empty($credentials['mode'])) {
            $this->setValidApiEnvironment($credentials['mode']);
        }
    }

    /**
     * Validate & set the environment to be used by Chargify.
     *
     * @param string $mode
     *
     * @return void
     */
    private function setValidApiEnvironment($mode)
    {
        $this->mode = !in_array($mode, ['sandbox', 'live']) ? 'live' : $mode;
    }

    /**
     * Set configuration details for the provider.
     *
     * @param array $credentials
     *
     * @throws Exception
     *
     * @return void
     */
    private function setApiProviderConfiguration($credentials)
    {
        // Setting Chargify API Credentials
        collect($credentials[$this->mode])->map(function ($value, $key) {
            $this->config[$key] = $value;
        });

        $this->apiUrl = strpos($this->config['site'], 'chargify.com') === false ?
            'https://' . $this->config['site'] . 'chargify.com' :
            $this->config['site'];

        $this->validateSSL = $credentials['validate_ssl'];
    }
}
