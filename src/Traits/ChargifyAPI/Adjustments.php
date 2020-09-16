<?php

namespace Srmklive\Chargify\Traits\ChargifyAPI;

trait Adjustments
{
    /**
     * Create an adjustment for a subscription.
     *
     * @param int    $subscription_id
     * @param int    $amount
     * @param string $memo
     *
     * @return array
     */
    public function adjust_subscription_balance($subscription_id, $amount, $memo): array
    {
        $this->options['json'] = [
            'adjustment' => [
                'amount' => $amount,
                'memo'   => $memo,
            ],
        ];

        $this->apiEndPoint = "/subscriptions/{$subscription_id}/adjustments.json";

        $this->verb = 'post';

        return $this->doChargifyRequest();
    }
}
