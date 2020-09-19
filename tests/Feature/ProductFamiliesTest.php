<?php

namespace Srmklive\Chargify\Tests\Feature;

use PHPUnit\Framework\TestCase;
use Srmklive\Chargify\Services\ChargifyClient;
use Srmklive\Chargify\Tests\MockClientClasses;
use Srmklive\Chargify\Tests\MockRequestPayloads;
use Srmklive\Chargify\Tests\MockResponsePayloads;

class ProductFamiliesTest extends TestCase
{
    use MockClientClasses;
    use MockRequestPayloads;
    use MockResponsePayloads;

    /** @var \Srmklive\Chargify\Services\ChargifyClient */
    protected $client;

    protected function setUp(): void
    {
        $this->client = new ChargifyClient($this->getMockApiCredentials());

        parent::setUp();
    }

    /** @test */
    public function it_can_create_a_product_family()
    {
        $expectedResponse = $this->mockProductFamilyDetailsResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $expectedParams = $this->mockCreateProductFamilyParams();

        $response = $this->client->product_family_create($expectedParams);

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('product_family', $response);
    }

    /** @test */
    public function it_can_get_details_for_a_product_family()
    {
        $expectedResponse = $this->mockProductFamilyDetailsResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->product_family_details(933860);

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('product_family', $response);
    }

    /** @test */
    public function it_can_list_all_product_families()
    {
        $expectedResponse = $this->mockProductFamiliesListResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->product_families_list();

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('product_family', $response[0]);
    }
}
