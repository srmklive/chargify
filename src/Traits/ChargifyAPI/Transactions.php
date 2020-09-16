<?php

namespace Srmklive\Chargify\Traits\ChargifyAPI;

trait Transactions
{
    /**
     * List transactions for a ChargifyClient site.
     *
     * @param int    $page
     * @param int    $per_page
     * @param string $order_by
     *
     * @return array
     */
    public function transactions_for_site($page = 1, $per_page = 200, $order_by = 'created_at'): array
    {
        $this->apiEndPoint = "/transactions.json?page={$page}&per_page={$per_page}&order_by={$order_by}";

        $this->verb = 'get';

        return $this->doChargifyRequest();
    }

    /**
     * List details for a transactions.
     *
     * @param int $transaction_id
     * @param int $page
     * @param int $per_page
     *
     * @return array
     */
    public function transaction_details($transaction_id, $page = 1, $per_page = 200): array
    {
        $this->apiEndPoint = "/transactions/{$transaction_id}.json?page={$page}&per_page={$per_page}";

        $this->verb = 'get';

        return $this->doChargifyRequest();
    }

    /**
     * List transactions for a subscription.
     *
     * @param int $subscription_id
     * @param int $page
     * @param int $per_page
     *
     * @return array
     */
    public function transactions_for_subscription($subscription_id, $page = 1, $per_page = 200): array
    {
        $this->apiEndPoint = "/subscriptions/{$subscription_id}/transactions.json?page={$page}&per_page={$per_page}";

        $this->verb = 'get';

        return $this->doChargifyRequest();
    }

    /**
     * List transactions for a ChargifyClient site.
     *
     * @return array
     */
    public function transactions_count(): array
    {
        $this->apiEndPoint = '/transactions/count.json';

        $this->verb = 'get';

        return $this->doChargifyRequest();
    }
}
