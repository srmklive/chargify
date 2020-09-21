<?php

namespace Srmklive\Chargify\Tests;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Handler\MockHandler as HttpMockHandler;
use GuzzleHttp\HandlerStack as HttpHandlerStack;
use GuzzleHttp\Psr7\Response as HttpResponse;
use Srmklive\Chargify\Services\ChargifyClient;

trait MockClientClasses
{
    private function mock_http_client($response): \GuzzleHttp\Client
    {
        $mock = new HttpMockHandler([
            new HttpResponse(
                200,
                [],
                ($response === false) ? '' : \GuzzleHttp\json_encode($response)
            ),
        ]);

        $handler = HttpHandlerStack::create($mock);

        return new HttpClient(['handler' => $handler]);
    }

    private function mock_client($expectedResponse, $expectedMethod, $expectedParams): \PHPUnit\Framework\MockObject\MockObject
    {
        $methods = [$expectedMethod];

        $mockClient = $this->getMockBuilder(ChargifyClient::class)
            ->setConstructorArgs($expectedParams)
            ->onlyMethods($methods)
            ->getMock();

        $mockClient->expects($this->exactly(1))
            ->method($expectedMethod)
            ->willReturn($expectedResponse);

        return $mockClient;
    }

    private function getMockApiCredentials(): array
    {
        return [
            'mode'    => 'sandbox',
            'sandbox' => [
                'public_key'    => 'some-public-key',
                'private_key'   => 'some-private-key',
                'api_key'       => 'some-api-key',
                'site'          => 'https://acme.chargify.com',
            ],
            'currency'      => 'USD',
            'validate_ssl'  => true,
        ];
    }
}
