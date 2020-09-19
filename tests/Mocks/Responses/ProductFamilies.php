<?php

namespace Srmklive\Chargify\Tests\Mocks\Responses;

trait ProductFamilies
{
    /**
     * @return array
     */
    protected function mockProductFamilyDetailsResponse()
    {
        return \GuzzleHttp\json_decode('{
  "product_family": {
    "id": 933860,
    "name": "Acme Projects",
    "description": "Amazing project management tool",
    "handle": "acme-projects",
    "accounting_code": null
  }
}', true);
    }

    /**
     * @return array
     */
    protected function mockProductFamiliesListResponse()
    {
        return \GuzzleHttp\json_decode('[{
  "product_family": {
    "id": 933860,
    "name": "Acme Projects",
    "description": "Amazing project management tool",
    "handle": "acme-projects",
    "accounting_code": null
  }
},{
  "product_family": {
    "id": 527890,
    "name": "Acme Projects",
    "description": "",
    "handle": "billing-plans",
    "accounting_code": null
  }
}]', true);
    }
}
