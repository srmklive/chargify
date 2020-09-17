<?php

namespace Srmklive\Chargify\Tests\Feature;

use PHPUnit\Framework\TestCase;
use Srmklive\Chargify\Services\ChargifyClient;
use Srmklive\Chargify\Tests\MockClientClasses;
use Srmklive\Chargify\Tests\MockResponsePayloads;

class SitesTest extends TestCase
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
    public function it_can_read_site_data()
    {
        $expectedResponse = $this->mockSiteDetailsResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->site_read();

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('site', $response);
    }

    /** @test */
    public function it_can_delete_site_data()
    {
        $this->client->setClient(
            $this->mock_http_client(false)
        );

        $response = $this->client->site_clear_data();

        $this->assertEmpty($response);
    }

    /** @test */
    public function it_can_delete_site_customers_data()
    {
        $this->client->setClient(
            $this->mock_http_client(false)
        );

        $response = $this->client->site_clear_data('customers');

        $this->assertEmpty($response);
    }
}
