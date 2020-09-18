<?php

namespace Srmklive\Chargify\Traits\ChargifyAPI;

trait Customers
{
    /**
     * Create customer.
     *
     * @param array $data
     *
     * @return array
     */
    public function customer_create(array $data): array
    {
        $this->apiEndPoint = '/customers.json';

        $this->verb = 'post';

        $this->options['json'] = [
            'customer' => $data,
        ];

        return $this->doChargifyRequest();
    }

    /**
     * Get customer details.
     *
     * @param int $customer_id
     *
     * @return array
     */
    public function customer_details(int $customer_id): array
    {
        $this->apiEndPoint = "/customers/{$customer_id}.json";

        $this->verb = 'get';

        return $this->doChargifyRequest();
    }

    /**
     * Get list of customers.
     *
     * @param string $direction
     * @param int    $page
     * @param string $date_field
     * @param string $start_date
     * @param string $end_date
     *
     * @return array
     */
    public function customer_list(string $direction = 'desc', int $page = 50, string $date_field = 'created_at', string $start_date = '', string $end_date = ''): array
    {
        $start_date_param = !empty($start_date) ? "&start_date={$start_date}" : '';
        $end_date_param = !empty($end_date) ? "&end_date={$end_date}" : '';

        $this->apiEndPoint = "/customers.json?direction={$direction}&page={$page}&date_field={$date_field}{$start_date_param}{$end_date_param}";

        $this->verb = 'get';

        return $this->doChargifyRequest();
    }

    /**
     * Get list of customers through lookup reference field.
     *
     * @param string $reference
     *
     * @return array
     */
    public function customer_lookup(string $reference): array
    {
        $this->apiEndPoint = "/customers/lookup.json?reference={$reference}";

        $this->verb = 'get';

        return $this->doChargifyRequest();
    }

    /**
     * Get list of customer subscriptions.
     *
     * @param int $customer_id
     *
     * @return array
     */
    public function customer_subscriptions(int $customer_id): array
    {
        $this->apiEndPoint = "/customers/{$customer_id}/subscriptions.json";

        $this->verb = 'get';

        return $this->doChargifyRequest();
    }

    /**
     * Search customers by parameter such as email, chargify id & organization.
     *
     * @param string $q
     *
     * @return array
     */
    public function customer_search(string $q): array
    {
        $this->apiEndPoint = "/customers.json?q={$q}";

        $this->verb = 'get';

        return $this->doChargifyRequest();
    }

    /**
     * Get customer details.
     *
     * @param int   $customer_id
     * @param array $data
     *
     * @return array
     */
    public function customer_update(int $customer_id, array $data): array
    {
        $this->apiEndPoint = "/customers/{$customer_id}.json";

        $this->verb = 'put';

        $this->options['json'] = [
            'customer' => $data,
        ];

        return $this->doChargifyRequest();
    }

    /**
     * Delete a customer.
     *
     * @param int $customer_id
     *
     * @return string
     */
    public function customer_delete(int $customer_id): string
    {
        $this->apiEndPoint = "/customers/{$customer_id}.json";

        $this->verb = 'delete';

        return $this->doChargifyRequest(false);
    }
}
