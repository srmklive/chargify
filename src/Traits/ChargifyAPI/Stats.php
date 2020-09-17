<?php

namespace Srmklive\Chargify\Traits\ChargifyAPI;

trait Stats
{
    /**
     * @return array
     */
    public function stats(): array
    {
        $this->apiEndPoint = '/stats.json';

        $this->verb = 'get';

        return $this->doChargifyRequest();
    }
}
