<?php

namespace Srmklive\Chargify\Tests\Feature;

use PHPUnit\Framework\TestCase;
use Srmklive\Chargify\Services\ChargifyClient;
use Srmklive\Chargify\Tests\MockClientClasses;
use Srmklive\Chargify\Tests\MockRequestPayloads;
use Srmklive\Chargify\Tests\MockResponsePayloads;

class ProductsPricePointsTest extends TestCase
{
    use MockClientClasses;
    use MockRequestPayloads;
    use MockResponsePayloads;

    /** @var \Srmklive\Chargify\Services\ChargifyClient */
    protected $client;

    protected function setUp(): void
    {
        $this->client = new ChargifyClient($this->getMockApiCredentials());

        parent::setUp();
    }

    /** @test */
    public function it_can_create_a_price_point()
    {
        $expectedResponse = $this->mockProductsPricePointDetailsResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $expectedParams = $this->mockCreatePricePointParams();

        $response = $this->client->product_price_point_create('4364984', $expectedParams);

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('price_point', $response);
    }

    /** @test */
    public function it_can_update_a_price_point()
    {
        $expectedResponse = $this->mockProductsPricePointDetailsResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $expectedParams = $this->mockCreatePricePointParams();

        $response = $this->client->product_price_point_update('4364984', '283', $expectedParams);

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('price_point', $response);
    }

    /** @test */
    public function it_can_get_details_for_a_price_point()
    {
        $expectedResponse = $this->mockProductsPricePointDetailsResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->product_price_point_details('4364984', '283');

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('price_point', $response);
    }

    /** @test */
    public function it_can_get_list_of_all_price_points()
    {
        $expectedResponse = $this->mockProductsPricePointListResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->product_price_point_list('4364984');

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('price_points', $response);
    }

    /** @test */
    public function it_can_unarchive_a_price_point()
    {
        $expectedResponse = $this->mockProductsPricePointDetailsResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->product_price_point_unarchive('4364984', '283');

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('price_point', $response);
    }

    /** @test */
    public function it_can_delete_a_price_point()
    {
        $expectedResponse = $this->mockProductsPricePointDetailsResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->product_price_point_delete('4364984', '283');

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('price_point', $response);
    }

    /** @test */
    public function it_can_set_a_price_point_as_default()
    {
        $expectedResponse = $this->mockProductsPricePointDetailsResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->product_price_point_default('4364984', '283');

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('price_point', $response);
    }

    /** @test */
    public function it_can_create_price_points_in_bulk()
    {
        $expectedResponse = $this->mockProductsPricePointListResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $expectedParams = $this->mockCreatePricePointParams();

        $response = $this->client->product_price_points_bulk_create('4364984', $expectedParams);

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('price_points', $response);
    }

    /** @test */
    public function it_can_create_currency_prices_for_product_price_point()
    {
        $expectedResponse = $this->mockProductsPricePointCurrenciesListResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $expectedParams = $this->mockCreatePricePointCurrenciesParams();

        $response = $this->client->product_price_point_create_currency_prices('283', $expectedParams);

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('currency_prices', $response);
    }

    /** @test */
    public function it_can_update_currency_prices_for_product_price_point()
    {
        $expectedResponse = $this->mockProductsPricePointCurrenciesListResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $expectedParams = $this->mockUpdatePricePointCurrenciesParams();

        $response = $this->client->product_price_point_update_currency_prices('283', $expectedParams);

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('currency_prices', $response);
    }
}
