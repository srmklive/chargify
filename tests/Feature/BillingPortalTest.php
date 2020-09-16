<?php

namespace Srmklive\Chargify\Tests\Feature;

use PHPUnit\Framework\TestCase;
use Srmklive\Chargify\Services\ChargifyClient;
use Srmklive\Chargify\Tests\MockClientClasses;
use Srmklive\Chargify\Tests\MockResponsePayloads;

class BillingPortalTest extends TestCase
{
    use MockClientClasses;
    use MockResponsePayloads;

    /** @var \Srmklive\Chargify\Services\ChargifyClient */
    protected $client;

    protected function setUp(): void
    {
        $this->client = new ChargifyClient($this->getMockApiCredentials());

        parent::setUp();
    }

    /** @test */
    public function it_can_get_billing_portal_details_for_a_customer()
    {
        $expectedResponse = $this->mockCustomerBillingPortalDetailsResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->customer_billing_portal_details(12345678);

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('url', $response);
    }

    /** @test */
    public function it_can_enable_billing_portal_for_a_customer()
    {
        $this->client->setClient(
            $this->mock_http_client(false)
        );

        $response = $this->client->customer_enable_billing_portal(12345678);

        $this->assertEmpty($response);
    }

    /** @test */
    public function it_can_enable_billing_portal_for_a_customer_and_send_invite()
    {
        $this->client->setClient(
            $this->mock_http_client(false)
        );

        $response = $this->client->customer_enable_billing_portal(12345678, true);

        $this->assertEmpty($response);
    }

    /** @test */
    public function it_can_revoke_billing_portal_invitation_for_a_customer()
    {
        $expectedResponse = $this->mockRevokeCustomerBillingPortalResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->customer_revoke_billing_portal(12345678);

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('uninvited_count', $response);
    }
}
