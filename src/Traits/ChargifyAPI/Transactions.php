<?php

namespace Srmklive\Chargify\Traits\ChargifyAPI;

trait Transactions
{
    /**
     * List transactions for a Chargify site.
     *
     * @param int    $page
     * @param int    $per_page
     * @param string $order_by
     *
     * @return array
     */
    public function transactions_for_site($page=1, $per_page=200, $order_by='created_at'): array
    {
        $this->apiEndPoint = "/transactions.json?page={$page}&per_page={$per_page}&order_by={$order_by}";

        $this->verb = 'get';

        return $this->doChargifyRequest();
    }
}
