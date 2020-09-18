<?php

namespace Srmklive\Chargify\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Srmklive\Chargify\Tests\MockClientClasses;
use Srmklive\Chargify\Tests\MockRequestPayloads;
use Srmklive\Chargify\Tests\MockResponsePayloads;

class CustomersTest extends TestCase
{
    use MockClientClasses;
    use MockRequestPayloads;
    use MockResponsePayloads;

    /** @test */
    public function it_can_create_a_customer()
    {
        $expectedResponse = $this->mockCustomerDetailsResponse();

        $expectedParams = $this->mockCustomerParams();

        $expectedMethod = 'customer_create';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}($expectedParams));
    }

    /** @test */
    public function it_can_get_customer_details()
    {
        $expectedResponse = $this->mockCustomerDetailsResponse();

        $expectedMethod = 'customer_details';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}(123456789));
    }

    /** @test */
    public function it_can_get_customer_list()
    {
        $expectedResponse = $this->mockCustomerListResponse();

        $expectedMethod = 'customer_list';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}());
    }

    /** @test */
    public function it_can_lookup_customers_by_reference_field()
    {
        $expectedResponse = $this->mockCustomerDetailsResponse();

        $expectedMethod = 'customer_lookup';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}(123456789));
    }

    /** @test */
    public function it_can_get_subscriptions_for_a_customer()
    {
        $expectedResponse = $this->mockCustomerSubscriptionsResponse();

        $expectedMethod = 'customer_subscriptions';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}(123456789));
    }

    /** @test */
    public function it_can_search_customers()
    {
        $expectedResponse = $this->mockCustomerListResponse();

        $expectedMethod = 'customer_search';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}('Acme'));
    }

    /** @test */
    public function it_can_update_a_customer()
    {
        $expectedResponse = $this->mockCustomerDetailsResponse();

        $expectedParams = $this->mockCustomerParams();

        $expectedMethod = 'customer_update';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}(123456789, $expectedParams));
    }

    /** @test */
    public function it_can_delete_a_customer()
    {
        $expectedResponse = '';

        $expectedMethod = 'customer_delete';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}(123456789));
    }
}
