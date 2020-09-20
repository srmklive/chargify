<?php

namespace Srmklive\Chargify\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Srmklive\Chargify\Tests\MockClientClasses;
use Srmklive\Chargify\Tests\MockRequestPayloads;
use Srmklive\Chargify\Tests\MockResponsePayloads;

class ProductsTest extends TestCase
{
    use MockClientClasses;
    use MockRequestPayloads;
    use MockResponsePayloads;

    /** @test */
    public function it_can_create_a_product()
    {
        $expectedResponse = $this->mockProductDetailsResponse();

        $expectedParams = $this->mockCreateProductParams();

        $expectedMethod = 'product_create';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}('933860', $expectedParams));
    }

    /** @test */
    public function it_can_get_details_for_a_product()
    {
        $expectedResponse = $this->mockProductDetailsResponse();

        $expectedMethod = 'product_details';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}('4364984'));
    }

    /** @test */
    public function it_can_get_details_for_a_product_by_product_handle()
    {
        $expectedResponse = $this->mockProductDetailsResponse();

        $expectedMethod = 'product_details_by_handle';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}('gold'));
    }

    /** @test */
    public function it_can_update_details_for_a_product()
    {
        $expectedResponse = $this->mockProductDetailsResponse();

        $expectedParams = $this->mockCreateProductParams();

        $expectedMethod = 'product_update';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}('4364984', $expectedParams));
    }

    /** @test */
    public function it_can_archive_a_product()
    {
        $expectedResponse = $this->mockProductDetailsResponse();

        $expectedMethod = 'product_archive';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}('4364984'));
    }
}
