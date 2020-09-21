<?php

namespace Srmklive\Chargify\Tests\Mocks\Requests;

trait ProductsFamilies
{
    protected function mockCreateProductFamilyParams(): array
    {
        return \GuzzleHttp\json_decode('{
    "name": "Acme Projects",
    "description": "Amazing project management tool"
  }', true);
    }
}
