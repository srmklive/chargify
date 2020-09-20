<?php

namespace Srmklive\Chargify\Tests\Mocks\Requests;

trait ProductsFamilies
{
    /**
     * @return array
     */
    protected function mockCreateProductFamilyParams()
    {
        return \GuzzleHttp\json_decode('{
    "name": "Acme Projects",
    "description": "Amazing project management tool"
  }', true);
    }
}
