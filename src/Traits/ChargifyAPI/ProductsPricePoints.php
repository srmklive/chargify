<?php

namespace Srmklive\Chargify\Traits\ChargifyAPI;

trait ProductsPricePoints
{
    /**
     * Create a product price point.
     *
     * @param string $product_id
     * @param array  $data
     *
     * @return array
     *
     * @link https://reference.chargify.com/v1/products-price-points/create-a-product-price-point
     */
    public function product_price_point_create(string $product_id, array $data): array
    {
        $this->apiEndPoint = "/products/{$product_id}/price_points.json";

        $this->verb = 'post';

        $this->options['json'] = [
            'price_point' => $data,
        ];

        return $this->doChargifyRequest();
    }

    /**
     * Update a product price point.
     *
     * @param string $product_id
     * @param string $price_point_id
     * @param array  $data
     *
     * @return array
     *
     * @link https://reference.chargify.com/v1/products-price-points/update-a-product-price-point
     */
    public function product_price_point_update(string $product_id, string $price_point_id, array $data): array
    {
        $this->apiEndPoint = "/products/{$product_id}/price_points/{$price_point_id}.json";

        $this->verb = 'put';

        $this->options['json'] = [
            'price_point' => $data,
        ];

        return $this->doChargifyRequest();
    }

    /**
     * Get a product price point details.
     *
     * @param string $product_id
     * @param string $price_point_id
     *
     * @return array
     *
     * @link https://reference.chargify.com/v1/products-price-points/read-a-product-price-point
     */
    public function product_price_point_details(string $product_id, string $price_point_id): array
    {
        $this->apiEndPoint = "/products/{$product_id}/price_points/{$price_point_id}.json";

        $this->verb = 'get';

        return $this->doChargifyRequest();
    }

    /**
     * Get list of product price points.
     *
     * @param string $product_id
     *
     * @return array
     *
     * @link https://reference.chargify.com/v1/products-price-points/read-product-price-points
     */
    public function product_price_point_list(string $product_id): array
    {
        $this->apiEndPoint = "/products/{$product_id}/price_points.json";

        $this->verb = 'get';

        return $this->doChargifyRequest();
    }

    /**
     * Un-archive a product price point.
     *
     * @param string $product_id
     * @param string $price_point_id
     *
     * @return array
     *
     * @link https://reference.chargify.com/v1/products-price-points/unarchive-a-product-point
     */
    public function product_price_point_unarchive(string $product_id, string $price_point_id): array
    {
        $this->apiEndPoint = "/products/{$product_id}/price_points/{$price_point_id}/unarchive.json";

        $this->verb = 'patch';

        return $this->doChargifyRequest();
    }

    /**
     * Delete a product price point.
     *
     * @param string $product_id
     * @param string $price_point_id
     *
     * @return array
     *
     * @link https://reference.chargify.com/v1/products-price-points/delete-a-product-price-point
     */
    public function product_price_point_delete(string $product_id, string $price_point_id): array
    {
        $this->apiEndPoint = "/products/{$product_id}/price_points/{$price_point_id}.json";

        $this->verb = 'delete';

        return $this->doChargifyRequest();
    }

    /**
     * Set a product price point as default.
     *
     * @param string $product_id
     * @param string $price_point_id
     *
     * @return array
     *
     * @link https://reference.chargify.com/v1/products-price-points/promote-a-product-price-point-to-default
     */
    public function product_price_point_default(string $product_id, string $price_point_id): array
    {
        $this->apiEndPoint = "/products/{$product_id}/price_points/{$price_point_id}/default.json";

        $this->verb = 'patch';

        return $this->doChargifyRequest();
    }

    /**
     * Create product price points in bulk.
     *
     * @param string $product_id
     * @param array  $data
     *
     * @return array
     *
     * @link https://reference.chargify.com/v1/products-price-points/bulk-create-product-price-points
     */
    public function product_price_points_bulk_create(string $product_id, array $data): array
    {
        $this->apiEndPoint = "/products/{$product_id}/price_points/bulk.json";

        $this->verb = 'post';

        $this->options['json'] = [
            'price_points' => $data,
        ];

        return $this->doChargifyRequest();
    }

    /**
     * Add currency pricing for a product price point.
     *
     * @param string $price_point_id
     * @param array  $data
     *
     * @return array
     *
     * @link https://reference.chargify.com/v1/products-price-points/create-currency-prices
     */
    public function product_price_point_create_currency_prices(string $price_point_id, array $data): array
    {
        $this->apiEndPoint = "/product_price_points/{$price_point_id}/currency_prices.json";

        $this->verb = 'post';

        $this->options['json'] = [
            'currency_prices' => $data,
        ];

        return $this->doChargifyRequest();
    }

    /**
     * Update currency pricing for a product price point.
     *
     * @param string $price_point_id
     * @param array  $data
     *
     * @return array
     *
     * @link https://reference.chargify.com/v1/products-price-points/update-currency-prices
     */
    public function product_price_point_update_currency_prices(string $price_point_id, array $data): array
    {
        $this->apiEndPoint = "/product_price_points/{$price_point_id}/currency_prices.json";

        $this->verb = 'put';

        $this->options['json'] = [
            'currency_prices' => $data,
        ];

        return $this->doChargifyRequest();
    }
}
