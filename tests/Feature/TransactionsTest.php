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

    /** @var \Srmklive\Chargify\Services\Chargify */
    protected $client;

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

    /** @test */
    public function it_can_get_transaction_details_for_a_site()
    {
        $expectedResponse = $this->mockGetTransactionResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->transaction_details(420716894);

        $this->assertNotEmpty($response);
        $this->assertIsArray($response);
        $this->assertArrayHasKey('transaction', $response);
    }

    /** @test */
    public function it_can_get_transaction_details_for_a_subscription()
    {
        $expectedResponse = $this->mockListTransactionsResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->transactions_for_subscription(35827797);

        $this->assertNotEmpty($response);
        $this->assertIsArray($response);
        $this->assertArrayHasKey('transaction', $response[0]);
    }

    /** @test */
    public function it_can_get_transaction_count_for_a_site()
    {
        $expectedResponse = $this->mockTransactionsCountResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->transactions_count();

        $this->assertNotEmpty($response);
        $this->assertIsArray($response);
        $this->assertArrayHasKey('count', $response);
    }
}
