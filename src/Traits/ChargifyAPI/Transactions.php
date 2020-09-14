<?php

namespace Srmklive\Chargify\Traits\ChargifyAPI;

trait Transactions
{
    public function transactions_for_site(): array
    {
        $this->apiEndPoint = '/transactions.json';

        $this->verb = 'get';

        return $this->doChargifyRequest();
    }
}
