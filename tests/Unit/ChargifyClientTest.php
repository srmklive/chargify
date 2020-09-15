<?php

namespace Srmklive\Chargify\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Srmklive\Chargify\Services\Chargify as ChargifyClient;

class ChargifyClientTest extends TestCase
{
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
}
