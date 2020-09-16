<?php

namespace Srmklive\Chargify\Traits\ChargifyAPI;

trait BillingPortal
{
    /**
     * Get billing portal details for a customer.
     *
     * @param int $customer_id
     *
     * @return array
     */
    public function customer_billing_portal_details($customer_id): array
    {
        $this->apiEndPoint = "/portal/customers/{$customer_id}/management_link.json";

        $this->verb = 'get';

        return $this->doChargifyRequest();
    }

    /**
     * Enable billing portal for a customer.
     *
     * @param int  $customer_id
     * @param bool $auto_invite
     *
     * @return string
     */
    public function customer_enable_billing_portal($customer_id, $auto_invite = false): string
    {
        $invite_param = ($auto_invite === true) ? '?auto_invite=1' : '';
        $this->apiEndPoint = "/portal/customers/{$customer_id}/enable.json{$invite_param}";

        $this->verb = 'post';

        return $this->doChargifyRequest(false);
    }

    /**
     * Revoke billing portal invitation for a customer.
     *
     * @param int $customer_id
     *
     * @return array
     */
    public function customer_revoke_billing_portal($customer_id): array
    {
        $this->apiEndPoint = "/portal/customers/{$customer_id}/invitations/revoke.json";

        $this->verb = 'delete';

        return $this->doChargifyRequest();
    }
}
