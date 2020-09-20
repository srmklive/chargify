<?php

namespace Srmklive\Chargify\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Srmklive\Chargify\Tests\MockClientClasses;
use Srmklive\Chargify\Tests\MockRequestPayloads;
use Srmklive\Chargify\Tests\MockResponsePayloads;

class ProductsFamiliesTest extends TestCase
{
    use MockClientClasses;
    use MockRequestPayloads;
    use MockResponsePayloads;

    /** @test */
    public function it_can_create_a_product_family()
    {
        $expectedResponse = $this->mockProductFamilyDetailsResponse();

        $expectedParams = $this->mockCreateProductFamilyParams();

        $expectedMethod = 'product_family_create';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}($expectedParams));
    }

    /** @test */
    public function it_can_get_details_for_a_product_family()
    {
        $expectedResponse = $this->mockProductFamilyDetailsResponse();

        $expectedMethod = 'product_family_details';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}(933860));
    }

    /** @test */
    public function it_can_list_all_product_families()
    {
        $expectedResponse = $this->mockProductFamiliesListResponse();

        $expectedMethod = 'product_families_list';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}());
    }

    /** @test */
    public function it_can_get_products_for_a_product_family()
    {
        $expectedResponse = $this->mockProductsListResponse();

        $expectedMethod = 'product_family_products';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}(933860));
    }
}
