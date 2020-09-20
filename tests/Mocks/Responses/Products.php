<?php

namespace Srmklive\Chargify\Tests\Mocks\Responses;

trait Products
{
    /**
     * @return array
     */
    protected function mockProductDetailsResponse()
    {
        return \GuzzleHttp\json_decode('{
  "product": {
    "id": 4364984,
    "name": "Gold Plan",
    "handle": "gold",
    "description": "This is our gold plan.",
    "accounting_code": "123",
    "request_credit_card": true,
    "expiration_interval": null,
    "expiration_interval_unit": null,
    "created_at": "2016-11-04T16:31:15-04:00",
    "updated_at": "2016-11-04T16:31:15-04:00",
    "price_in_cents": 1000,
    "interval": 1,
    "interval_unit": "month",
    "initial_charge_in_cents": null,
    "trial_price_in_cents": null,
    "trial_interval": null,
    "trial_interval_unit": null,
    "archived_at": null,
    "require_credit_card": true,
    "return_params": null,
    "taxable": false,
    "update_return_url": null,
    "initial_charge_after_trial": false,
    "version_number": 1,
    "update_return_params": null,
    "product_family": {
      "id": 527890,
      "name": "Acme Projects",
      "description": "",
      "handle": "billing-plans",
      "accounting_code": null
    },
    "public_signup_pages": [
      {
        "id": 301078,
        "return_url": null,
        "return_params": null,
        "url": "https://general-goods.chargify.com/subscribe/ftgbpq7f5qpr/gold"
      }
    ],
    "product_price_point_name": "Default"
  }
}', true);
    }

    /**
     * @return array
     */
    protected function mockProductsListResponse()
    {
        return \GuzzleHttp\json_decode('[
  {
    "product": {
      "id": 3801242,
      "name": "Free product",
      "handle": "zero-dollar-product",
      "description": "",
      "accounting_code": "",
      "request_credit_card": true,
      "expiration_interval": null,
      "expiration_interval_unit": "never",
      "created_at": "2016-04-21T16:08:39-04:00",
      "updated_at": "2016-08-03T11:27:53-04:00",
      "price_in_cents": 10000,
      "interval": 1,
      "interval_unit": "month",
      "initial_charge_in_cents": 0,
      "trial_price_in_cents": null,
      "trial_interval": null,
      "trial_interval_unit": "month",
      "archived_at": null,
      "require_credit_card": false,
      "return_params": "",
      "taxable": false,
      "update_return_url": "",
      "initial_charge_after_trial": false,
      "version_number": 4,
      "update_return_params": "",
      "product_family": {
        "id": 527890,
        "name": "Acme Projects",
        "description": "",
        "handle": "billing-plans",
        "accounting_code": null
      },
      "public_signup_pages": [
        {
          "id": 283460,
          "return_url": null,
          "return_params": "",
          "url": "https://general-goods.chargify.com/subscribe/smcc4j3d2w6h/zero-dollar-product"
        }
      ],
      "product_price_point_name": "Default"
    }
  },
  {
    "product": {
      "id": 3858146,
      "name": "Calendar Billing Product",
      "handle": "calendar-billing-product",
      "description": "",
      "accounting_code": "",
      "request_credit_card": true,
      "expiration_interval": null,
      "expiration_interval_unit": "never",
      "created_at": "2016-07-05T13:07:38-04:00",
      "updated_at": "2016-07-05T13:07:38-04:00",
      "price_in_cents": 10000,
      "interval": 1,
      "interval_unit": "month",
      "initial_charge_in_cents": null,
      "trial_price_in_cents": null,
      "trial_interval": null,
      "trial_interval_unit": "month",
      "archived_at": null,
      "require_credit_card": true,
      "return_params": "",
      "taxable": false,
      "update_return_url": "",
      "initial_charge_after_trial": false,
      "version_number": 1,
      "update_return_params": "",
      "product_family": {
        "id": 527890,
        "name": "Acme Projects",
        "description": "",
        "handle": "billing-plans",
        "accounting_code": null
      },
      "public_signup_pages": [
        {
          "id": 289193,
          "return_url": "",
          "return_params": "",
          "url": "https://general-goods.chargify.com/subscribe/gxdbfxzxhcjq/calendar-billing-product"
        }
      ],
      "product_price_point_name": "Default"
    }
  }
]', true);
    }
}
