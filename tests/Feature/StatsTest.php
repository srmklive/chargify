<?php

namespace Srmklive\Chargify\Tests\Feature;

use PHPUnit\Framework\TestCase;
use Srmklive\Chargify\Services\Chargify as ChargifyClient;
use Srmklive\Chargify\Tests\MockClientClasses;
use Srmklive\Chargify\Tests\MockResponsePayloads;

class StatsTest extends TestCase
{
    use MockClientClasses;
    use MockResponsePayloads;

    /** @var \Srmklive\Chargify\Services\Chargify */
    protected $client;

    protected function setUp(): void
    {
        $this->client = new ChargifyClient($this->getMockApiCredentials());

        parent::setUp();
    }

    /** @test */
    public function it_can_list_stats_for_a_site()
    {
        $expectedResponse = $this->mockStatsResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->stats();

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('stats', $response);
    }
}
