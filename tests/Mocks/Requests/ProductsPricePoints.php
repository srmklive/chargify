<?php

namespace Srmklive\Chargify\Tests\Mocks\Requests;

trait ProductsPricePoints
{
    protected function mockCreatePricePointParams(): array
    {
        return \GuzzleHttp\json_decode('{
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
    "expiration_interval_unit": "month"
  }', true);
    }

    protected function mockCreatePricePointCurrenciesParams(): array
    {
        return \GuzzleHttp\json_decode('[
    {
      "currency": "CAD",
      "price": 15,
      "role": "baseline"
    }
  ]', true);
    }

    protected function mockUpdatePricePointCurrenciesParams(): array
    {
        return \GuzzleHttp\json_decode('[
    {
      "id": 2838235,
      "price": 15
    }
  ]', true);
    }
}
