<?php

namespace Srmklive\Chargify\Tests\Feature;

use PHPUnit\Framework\TestCase;
use Srmklive\Chargify\Services\ChargifyClient;
use Srmklive\Chargify\Tests\MockClientClasses;
use Srmklive\Chargify\Tests\MockResponsePayloads;

class WebHooksTest extends TestCase
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
    public function it_can_list_web_hooks_events()
    {
        $expectedResponse = $this->mockWebHooksListResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->webhooks_list();

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('webhook', $response[0]);
    }

    /** @test */
    public function it_can_replay_web_hooks()
    {
        $expectedResponse = $this->mockWebHooksReplayResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->webhooks_replay([123456788, 123456789]);

        $this->assertNotEmpty($response);
        $this->assertEquals('ok', $response['status']);
    }

    /** @test */
    public function it_can_create_web_hooks()
    {
        $expectedResponse = $this->mockWebHooksDetailsResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->webhooks_create(
            'https://your.site/webhooks',
            [
                'payment_success',
                'payment_failure',
            ]
        );

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('endpoint', $response);
    }

    /** @test */
    public function it_can_update_web_hooks()
    {
        $expectedResponse = $this->mockWebHooksDetailsResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->webhooks_update(
            '1',
            'https://your.site/webhooks',
            [
                'payment_success',
                'payment_failure',
            ]
        );

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('endpoint', $response);
    }

    /** @test */
    public function it_can_list_web_hooks_endpoints()
    {
        $expectedResponse = $this->mockWebHooksEndpointsResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->webhooks_endpoints();

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('url', $response[0]);
    }

    /** @test */
    public function it_can_enable_web_hooks()
    {
        $expectedResponse = $this->mockWebHooksEnabledResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->webhooks_enable();

        $this->assertNotEmpty($response);
        $this->assertTrue($response['webhooks_enabled']);
    }
}
