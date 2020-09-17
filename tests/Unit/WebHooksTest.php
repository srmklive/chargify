<?php

namespace Srmklive\Chargify\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Srmklive\Chargify\Tests\MockClientClasses;
use Srmklive\Chargify\Tests\MockResponsePayloads;

class WebHooksTest extends TestCase
{
    use MockClientClasses;
    use MockResponsePayloads;

    /** @test */
    public function it_can_list_web_hooks_events()
    {
        $expectedResponse = $this->mockWebHooksListResponse();

        $expectedMethod = 'webhooks_list';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}());
    }

    /** @test */
    public function it_can_replay_web_hooks()
    {
        $expectedResponse = $this->mockWebHooksReplayResponse();

        $expectedMethod = 'webhooks_replay';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}([123456788, 123456789]));
    }

    /** @test */
    public function it_can_create_web_hooks()
    {
        $expectedResponse = $this->mockWebHooksDetailsResponse();

        $expectedMethod = 'webhooks_create';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}(
            'https://your.site/webhooks',
            [
                'payment_success',
                'payment_failure',
            ]
        ));
    }

    /** @test */
    public function it_can_update_web_hooks()
    {
        $expectedResponse = $this->mockWebHooksDetailsResponse();

        $expectedMethod = 'webhooks_update';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}(
            '1',
            'https://your.site/webhooks',
            [
                'payment_success',
                'payment_failure',
            ]
        ));
    }

    /** @test */
    public function it_can_list_web_hooks_endpoints()
    {
        $expectedResponse = $this->mockWebHooksEndpointsResponse();

        $expectedMethod = 'webhooks_endpoints';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}());
    }

    /** @test */
    public function it_can_enable_web_hooks()
    {
        $expectedResponse = $this->mockWebHooksReplayResponse();

        $expectedMethod = 'webhooks_enable';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}());
    }
}
