<?php

namespace Srmklive\Chargify\Tests\Mocks\Responses;

trait ProductsPricePoints
{
    protected function mockProductsPricePointDetailsResponse(): array
    {
        return \GuzzleHttp\json_decode('{
  "price_point": {
    "id": 283,
    "name": "Educational",
    "handle": "educational",
    "price_in_cents": 1000,
    "interval": 1,
    "interval_unit": "month",
    "trial_price_in_cents": 4900,
    "trial_interval": 1,
    "trial_interval_unit": "month",
    "trial_type": "payment_expected",
    "initial_charge_in_cents": 120000,
    "initial_charge_after_trial": false,
    "expiration_interval": 12,
    "expiration_interval_unit": "month",
    "product_id": 901,
    "archived_at": "Tue, 30 Oct 2018 18:49:47 EDT -04:00",
    "created_at": "Tue, 23 Oct 2018 18:49:47 EDT -04:00",
    "updated_at": "Tue, 23 Oct 2018 18:49:47 EDT -04:00"
  }
}', true);
    }

    protected function mockProductsPricePointListResponse(): array
    {
        return \GuzzleHttp\json_decode('{
  "price_points": [
    {
      "id": 283,
      "name": "Educational",
      "handle": "educational",
      "price_in_cents": 1000,
      "interval": 1,
      "interval_unit": "month",
      "trial_price_in_cents": 4900,
      "trial_interval": 1,
      "trial_interval_unit": "month",
      "trial_type": "payment_expected",
      "initial_charge_in_cents": 120000,
      "initial_charge_after_trial": false,
      "expiration_interval": 12,
      "expiration_interval_unit": "month",
      "product_id": 901,
      "archived_at": "Tue, 30 Oct 2018 18:49:47 EDT -04:00",
      "created_at": "Tue, 23 Oct 2018 18:49:47 EDT -04:00",
      "updated_at": "Tue, 23 Oct 2018 18:49:47 EDT -04:00"
    }
  ]
}', true);
    }

    protected function mockProductsPricePointCurrenciesListResponse(): array
    {
        return \GuzzleHttp\json_decode('{
    "currency_prices": [
        {
            "id": 2838235,
            "currency": "CAD",
            "price": "15.0",
            "formatted_price": "$15.00 CAD",
            "product_price_point_id": 946093,
            "role": "baseline"
        }
    ]
}', true);
    }
}
