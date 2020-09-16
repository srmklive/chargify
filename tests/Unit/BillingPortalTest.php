<?php

namespace Srmklive\Chargify\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Srmklive\Chargify\Tests\MockClientClasses;
use Srmklive\Chargify\Tests\MockResponsePayloads;

class BillingPortalTest extends TestCase
{
    use MockClientClasses;
    use MockResponsePayloads;

    /** @test */
    public function it_can_get_billing_portal_details_for_a_customer()
    {
        $expectedResponse = $this->mockCustomerBillingPortalDetailsResponse();

        $expectedMethod = 'customer_billing_portal_details';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}(12345678));
    }

    /** @test */
    public function it_can_enable_billing_portal_for_a_customer()
    {
        $expectedResponse = '';

        $expectedMethod = 'customer_enable_billing_portal';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}(12345678));
    }

    /** @test */
    public function it_can_enable_billing_portal_for_a_customer_and_send_invite()
    {
        $expectedResponse = '';

        $expectedMethod = 'customer_enable_billing_portal';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}(12345678, true));
    }

    /** @test */
    public function it_can_revoke_billing_portal_invitation_for_a_customer()
    {
        $expectedResponse = $this->mockRevokeCustomerBillingPortalResponse();

        $expectedMethod = 'customer_revoke_billing_portal';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}(12345678));
    }
}
