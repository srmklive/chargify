<?php

namespace Srmklive\Chargify\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Srmklive\Chargify\Tests\MockClientClasses;
use Srmklive\Chargify\Tests\MockResponsePayloads;

class TransactionsTest extends TestCase
{
    use MockClientClasses;
    use MockResponsePayloads;

    /** @test */
    public function it_can_list_transactions_for_a_site()
    {
        $expectedResponse = $this->mockListTransactionsResponse();

        $expectedMethod = 'transactions_for_site';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}());
    }

    /** @test */
    public function it_can_get_transaction_details_for_a_site()
    {
        $expectedResponse = $this->mockGetTransactionResponse();

        $expectedMethod = 'transaction_details';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}(420716894));
    }

    /** @test */
    public function it_can_get_transaction_details_for_a_subscription()
    {
        $expectedResponse = $this->mockListTransactionsResponse();

        $expectedMethod = 'transactions_for_subscription';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}(35827797));
    }

    /** @test */
    public function it_can_get_transaction_count_for_a_site()
    {
        $expectedResponse = $this->mockGetTransactionResponse();

        $expectedMethod = 'transactions_count';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}());
    }
}
