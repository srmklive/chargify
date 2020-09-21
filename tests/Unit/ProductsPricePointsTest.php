<?php

namespace Srmklive\Chargify\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Srmklive\Chargify\Tests\MockClientClasses;
use Srmklive\Chargify\Tests\MockRequestPayloads;
use Srmklive\Chargify\Tests\MockResponsePayloads;

class ProductsPricePointsTest extends TestCase
{
    use MockClientClasses;
    use MockRequestPayloads;
    use MockResponsePayloads;

    /** @test */
    public function it_can_create_a_price_point()
    {
        $expectedResponse = $this->mockProductsPricePointDetailsResponse();

        $expectedParams = $this->mockCreatePricePointParams();

        $expectedMethod = 'product_price_point_create';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}('4364984', $expectedParams));
    }

    /** @test */
    public function it_can_update_a_price_point()
    {
        $expectedResponse = $this->mockProductsPricePointDetailsResponse();

        $expectedParams = $this->mockCreatePricePointParams();

        $expectedMethod = 'product_price_point_update';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}('4364984', '283', $expectedParams));
    }

    /** @test */
    public function it_can_get_details_for_a_price_point()
    {
        $expectedResponse = $this->mockProductsPricePointDetailsResponse();

        $expectedMethod = 'product_price_point_details';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}('4364984', '283'));
    }

    /** @test */
    public function it_can_get_list_of_all_price_points()
    {
        $expectedResponse = $this->mockProductsPricePointListResponse();

        $expectedMethod = 'product_price_point_list';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}('4364984'));
    }

    /** @test */
    public function it_can_unarchive_a_price_point()
    {
        $expectedResponse = $this->mockProductsPricePointDetailsResponse();

        $expectedMethod = 'product_price_point_unarchive';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}('4364984', '283'));
    }

    /** @test */
    public function it_can_delete_a_price_point()
    {
        $expectedResponse = $this->mockProductsPricePointDetailsResponse();

        $expectedMethod = 'product_price_point_delete';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}('4364984', '283'));
    }

    /** @test */
    public function it_can_set_a_price_point_as_default()
    {
        $expectedResponse = $this->mockProductsPricePointDetailsResponse();

        $expectedMethod = 'product_price_point_default';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}('4364984', '283'));
    }

    /** @test */
    public function it_can_create_price_points_in_bulk()
    {
        $expectedResponse = $this->mockProductsPricePointListResponse();

        $expectedParams = $this->mockCreatePricePointParams();

        $expectedMethod = 'product_price_points_bulk_create';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}('4364984', $expectedParams));
    }

    /** @test */
    public function it_can_create_currency_prices_for_product_price_point()
    {
        $expectedResponse = $this->mockProductsPricePointCurrenciesListResponse();

        $expectedParams = $this->mockCreatePricePointCurrenciesParams();

        $expectedMethod = 'product_price_point_create_currency_prices';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}('283', $expectedParams));
    }

    /** @test */
    public function it_can_update_currency_prices_for_product_price_point()
    {
        $expectedResponse = $this->mockProductsPricePointCurrenciesListResponse();

        $expectedParams = $this->mockUpdatePricePointCurrenciesParams();

        $expectedMethod = 'product_price_point_update_currency_prices';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}('283', $expectedParams));
    }
}
