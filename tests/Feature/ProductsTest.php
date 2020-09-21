<?php

namespace Srmklive\Chargify\Tests\Feature;

use PHPUnit\Framework\TestCase;
use Srmklive\Chargify\Services\ChargifyClient;
use Srmklive\Chargify\Tests\MockClientClasses;
use Srmklive\Chargify\Tests\MockRequestPayloads;
use Srmklive\Chargify\Tests\MockResponsePayloads;

class ProductsTest extends TestCase
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
    public function it_can_create_a_product()
    {
        $expectedResponse = $this->mockProductDetailsResponse();

        $expectedParams = $this->mockCreateProductParams();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->product_create('933860', $expectedParams);

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('product', $response);
    }

    /** @test */
    public function it_can_get_details_for_a_product()
    {
        $expectedResponse = $this->mockProductDetailsResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->product_details('4364984');

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('product', $response);
    }

    /** @test */
    public function it_can_get_details_for_a_product_by_product_handle()
    {
        $expectedResponse = $this->mockProductDetailsResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->product_details_by_handle('gold');

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('product', $response);
    }

    /** @test */
    public function it_can_update_details_for_a_product()
    {
        $expectedResponse = $this->mockProductDetailsResponse();

        $expectedParams = $this->mockCreateProductParams();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->product_update('4364984', $expectedParams);

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('product', $response);
    }

    /** @test */
    public function it_can_archive_a_product()
    {
        $expectedResponse = $this->mockProductDetailsResponse();

        $this->client->setClient(
            $this->mock_http_client($expectedResponse)
        );

        $response = $this->client->product_archive('4364984');

        $this->assertNotEmpty($response);
        $this->assertArrayHasKey('product', $response);
    }
}
