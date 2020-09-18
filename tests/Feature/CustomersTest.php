<?php

namespace Srmklive\Chargify\Tests\Feature;

use PHPUnit\Framework\TestCase;
use Srmklive\Chargify\Services\ChargifyClient;
use Srmklive\Chargify\Tests\MockClientClasses;
use Srmklive\Chargify\Tests\MockRequestPayloads;
use Srmklive\Chargify\Tests\MockResponsePayloads;

class CustomersTest extends TestCase
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
    public function it_can_create_a_customer()
    {
        $expectedResponse = $this->mockCustomerDetailsResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $expectedParams = $this->mockCustomerParams();

        $response = $this->client->customer_create($expectedParams);

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('customer', $response);
    }

    /** @test */
    public function it_can_get_customer_details()
    {
        $expectedResponse = $this->mockCustomerDetailsResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->customer_details(123456789);

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('customer', $response);
    }

    /** @test */
    public function it_can_get_customer_list()
    {
        $expectedResponse = $this->mockCustomerListResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->customer_list();

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('customer', $response[0]);
    }

    /** @test */
    public function it_can_lookup_customers_by_reference_field()
    {
        $expectedResponse = $this->mockCustomerDetailsResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->customer_lookup(123456789);

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('customer', $response);
    }

    /** @test */
    public function it_can_get_subscriptions_for_a_customer()
    {
        $expectedResponse = $this->mockCustomerSubscriptionsResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->customer_subscriptions(123456789);

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('subscription', $response[0]);
    }

    /** @test */
    public function it_can_search_customers()
    {
        $expectedResponse = $this->mockCustomerListResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->customer_search('Acme');

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('customer', $response[0]);
    }

    /** @test */
    public function it_can_update_a_customer()
    {
        $expectedResponse = $this->mockCustomerDetailsResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $expectedParams = $this->mockCustomerParams();

        $response = $this->client->customer_update(123456789, $expectedParams);

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('customer', $response);
    }

    /** @test */
    public function it_can_delete_a_customer()
    {
        $this->client->setClient(
            $this->mock_http_client(false)
        );

        $response = $this->client->customer_delete(123456789);

        $this->assertEmpty($response);
    }
}
