<?php

namespace Srmklive\Chargify\Traits\ChargifyAPI;

trait Products
{
    /**
     * Create a new product.
     *
     * @param string $product_family_id
     * @param array  $data
     *
     * @return array
     */
    public function product_create(string $product_family_id, array $data): array
    {
        $this->apiEndPoint = "/product_families/{$product_family_id}/products.json";

        $this->verb = 'post';

        $this->options['json'] = [
            'product' => $data,
        ];

        return $this->doChargifyRequest();
    }

    /**
     * Get product details.
     *
     * @param string $product_id
     *
     * @return array
     */
    public function product_details(string $product_id): array
    {
        $this->apiEndPoint = "/products/{$product_id}.json";

        $this->verb = 'get';

        return $this->doChargifyRequest();
    }

    /**
     * Get product details via API Handle.
     *
     * @param string $handle
     *
     * @return array
     */
    public function product_details_by_handle(string $handle): array
    {
        $this->apiEndPoint = "/products/handle/{$handle}.json";

        $this->verb = 'get';

        return $this->doChargifyRequest();
    }

    /**
     * Update product details.
     *
     * @param string $product_id
     * @param array  $data
     *
     * @return array
     */
    public function product_update(string $product_id, array $data): array
    {
        $this->apiEndPoint = "/products/{$product_id}.json";

        $this->verb = 'put';

        $this->options['json'] = [
            'product' => $data,
        ];

        return $this->doChargifyRequest();
    }

    /**
     * Archive a product.
     *
     * @param string $product_id
     *
     * @return array
     */
    public function product_archive(string $product_id): array
    {
        $this->apiEndPoint = "/products/{$product_id}.json";

        $this->verb = 'delete';

        return $this->doChargifyRequest();
    }
}
