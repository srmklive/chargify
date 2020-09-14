<?php

namespace Srmklive\Chargify\Facades;

/*
 * Class Facade
 * @package Srmklive\Chargify\Facades
 */

use Illuminate\Support\Facades\Facade;

class Chargify extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Srmklive\Chargify\ChargifyFacadeAccessor';
    }
}
