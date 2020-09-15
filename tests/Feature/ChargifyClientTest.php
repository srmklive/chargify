<?php

namespace Srmklive\Chargify\Tests\Feature;

use PHPUnit\Framework\TestCase;
use Srmklive\Chargify\Services\Chargify as ChargifyClient;
use Srmklive\Chargify\Tests\MockClientClasses;

class ChargifyClientTest extends TestCase
{
    use MockClientClasses;

    /** @var \Srmklive\Chargify\Services\Chargify */
    protected $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = new ChargifyClient();
    }

    /** @test */
    public function it_can_instantiate()
    {
        $this->assertInstanceOf(ChargifyClient::class, $this->client);
    }

    /** @test */
    public function it_throws_exception_if_invalid_credentials_are_provided()
    {
        $this->expectException(\RuntimeException::class);

        $this->client = new ChargifyClient([]);
    }

    /** @test */
    public function it_can_take_valid_credentials_and_return_the_client_instance()
    {
        $this->assertInstanceOf(ChargifyClient::class, $this->client);
    }

    /** @test */
    public function it_throws_exception_if_invalid_credentials_are_provided_through_method()
    {
        $this->expectException(\RuntimeException::class);

        $this->client->setApiCredentials([]);
    }

    /** @test */
    public function it_returns_the_client_instance_if_valid_credentials_are_provided_through_method()
    {
        $this->client->setApiCredentials($this->getMockApiCredentials());

        $this->assertInstanceOf(ChargifyClient::class, $this->client);
    }

    /** @test */
    public function it_returns_the_client_instance_if_chargify_domain_is_provided_with_valid_credentials()
    {
        $credentials = $this->getMockApiCredentials();
        $credentials['sandbox']['site'] = 'acme';

        $this->client->setApiCredentials($credentials);

        $this->assertInstanceOf(ChargifyClient::class, $this->client);
    }

    /** @test */
    public function it_throws_exception_if_invalid_currency_is_set()
    {
        $this->expectException(\RuntimeException::class);

        $this->client->setCurrency('PKR');

        $this->assertNotEquals('PKR', $this->client->getCurrency());
    }

    /** @test */
    public function it_can_set_a_valid_currency()
    {
        $this->client->setCurrency('EUR');

        $this->assertNotEmpty($this->client->getCurrency());
        $this->assertEquals('EUR', $this->client->getCurrency());
    }
}
