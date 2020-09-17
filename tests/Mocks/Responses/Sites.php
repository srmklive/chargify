<?php

namespace Srmklive\Chargify\Tests\Mocks\Responses;

trait Sites
{
    /**
     * @return array
     */
    protected function mockSiteDetailsResponse()
    {
        return \GuzzleHttp\json_decode('{
  "site": {
    "id": 68,
    "name": "Invoice Centric Billing",
    "subdomain": "invoices",
    "currency": "USD",
    "seller_id": 2,
    "non_primary_currencies": [
      "GBP"
    ],
    "relationship_invoicing_enabled": true,
    "customer_hierarchy_enabled": true,
    "whopays_enabled": true,
    "whopays_default_payer": "eldest"
  }
}', true);
    }
}
