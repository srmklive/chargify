<?php

namespace Srmklive\Chargify\Tests\Feature;

use PHPUnit\Framework\TestCase;
use Srmklive\Chargify\Services\Chargify as ChargifyClient;
use Srmklive\Chargify\Tests\MockClientClasses;
use Srmklive\Chargify\Tests\MockResponsePayloads;

class TransactionsTest extends TestCase
{
    use MockClientClasses;
    use MockResponsePayloads;

    protected function setUp(): void
    {
        $this->client = new ChargifyClient($this->getMockApiCredentials());

        parent::setUp();
    }

    /** @test */
    public function it_can_list_transactions_for_a_site()
    {
        $expectedResponse = $this->mockListTransactionsResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->transactions_for_site();

        $this->assertNotEmpty($response);
        $this->assertIsArray($response);
        $this->assertArrayHasKey('transaction', $response[0]);
    }
}
