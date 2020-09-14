<?php

namespace Srmklive\Chargify\Services;

use Srmklive\Chargify\Traits\ChargifyRequest;

class Chargify
{
    use ChargifyRequest;

    /**
     * Chargify constructor.
     *
     * @param string|array $config
     *
     * @throws \Exception
     */
    public function __construct($config = '')
    {
        // Setting PayPal API Credentials
        if (is_array($config)) {
            $this->setConfig($config);
        }

        $this->httpBodyParam = 'form_params';

        $this->options = [];
        $this->options['headers'] = [
            'Content-Type'  => 'application/json',
            'Authorization' => 'Basic ' . base64_encode($this->config['api_key']),
        ];
    }
}
