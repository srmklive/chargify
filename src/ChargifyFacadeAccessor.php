<?php

namespace Srmklive\Chargify;

use Exception;
use Srmklive\Chargify\Services\Chargify as ChargifyClient;

class ChargifyFacadeAccessor
{
    /**
     * Chargify API provider object.
     *
     * @var
     */
    public static $provider;

    /**
     * Get Chargify API provider object to use.
     *
     * @throws Exception
     *
     * @return \Srmklive\Chargify\Services\Chargify
     */
    public static function getProvider()
    {
        return self::$provider;
    }

    /**
     * Set Chargify API Client to use.
     *
     * @throws \Exception
     *
     * @return \Srmklive\Chargify\Services\Chargify
     */
    public static function setProvider()
    {
        // Set default provider.
        self::$provider = new ChargifyClient();

        return self::getProvider();
    }
}
