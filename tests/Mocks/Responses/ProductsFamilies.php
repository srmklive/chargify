<?php

namespace Srmklive\Chargify\Tests\Mocks\Responses;

trait ProductsFamilies
{
    protected function mockProductFamilyDetailsResponse(): array
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

    protected function mockProductFamiliesListResponse(): array
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
