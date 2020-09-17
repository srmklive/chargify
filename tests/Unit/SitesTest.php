<?php

namespace Srmklive\Chargify\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Srmklive\Chargify\Tests\MockClientClasses;
use Srmklive\Chargify\Tests\MockResponsePayloads;

class SitesTest extends TestCase
{
    use MockClientClasses;
    use MockResponsePayloads;

    /** @test */
    public function it_can_read_site_data()
    {
        $expectedResponse = $this->mockSiteDetailsResponse();

        $expectedMethod = 'site_read';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}());
    }

    /** @test */
    public function it_can_delete_site_data()
    {
        $expectedResponse = '';

        $expectedMethod = 'site_clear_data';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}());
    }

    /** @test */
    public function it_can_delete_site_customers_data()
    {
        $expectedResponse = '';

        $expectedMethod = 'site_clear_data';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getMockApiCredentials());

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}('customers'));
    }
}
