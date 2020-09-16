<?php

namespace Srmklive\Chargify\Services;

use Srmklive\Chargify\Traits\ChargifyRequest;

class ChargifyClient
{
    use ChargifyRequest;

    /**
     * ChargifyClient constructor.
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
    }
}
