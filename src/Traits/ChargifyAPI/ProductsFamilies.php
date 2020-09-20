<?php

namespace Srmklive\Chargify\Traits\ChargifyAPI;

trait ProductsFamilies
{
    /**
     * Create a product family.
     *
     * @param array $data
     *
     * @return array
     */
    public function product_family_create(array $data): array
    {
        $this->apiEndPoint = '/product_families.json';

        $this->verb = 'post';

        $this->options['json'] = [
            'product_family' => $data,
        ];

        return $this->doChargifyRequest();
    }

    /**
     * Get details for a product family.
     *
     * @param int $family_id
     *
     * @return array
     */
    public function product_family_details(int $family_id): array
    {
        $this->apiEndPoint = "/product_families/{$family_id}.json";

        $this->verb = 'get';

        return $this->doChargifyRequest();
    }

    /**
     * Create a product family.
     *
     * @return array
     */
    public function product_families_list(): array
    {
        $this->apiEndPoint = '/product_families.json';

        $this->verb = 'get';

        return $this->doChargifyRequest();
    }

    /**
     * Get products list for a product family.
     *
     * @param int $family_id
     *
     * @return array
     */
    public function product_family_products(int $family_id): array
    {
        $this->apiEndPoint = "/product_families/{$family_id}/products.json";

        $this->verb = 'get';

        return $this->doChargifyRequest();
    }
}
