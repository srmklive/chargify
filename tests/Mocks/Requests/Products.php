<?php

namespace Srmklive\Chargify\Tests\Mocks\Requests;

trait Products
{
    protected function mockCreateProductParams(): array
    {
        return \GuzzleHttp\json_decode('{
    "name": "Gold Plan",
    "handle": "gold",
    "description": "This is our gold plan.",
    "accounting_code": "123",
    "request_credit_card": true,
    "price_in_cents": 1000,
    "interval": 1,
    "interval_unit": "month",
    "auto_create_signup_page": true,
    "tax_code": "D0000000"
  }', true);
    }
}
