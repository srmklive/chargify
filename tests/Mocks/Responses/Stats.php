<?php

namespace Srmklive\Chargify\Tests\Mocks\Responses;

trait Stats
{
    protected function mockStatsResponse(): array
    {
        return \GuzzleHttp\json_decode('{
    "seller_name": "test-site",
    "site_name": "gocardless",
    "site_id": 20803,
    "site_currency": "EUR",
    "stats": {
        "total_subscriptions": 5,
        "total_canceled_subscriptions": 0,
        "total_active_subscriptions": 3,
        "total_past_due_subscriptions": 0,
        "total_unpaid_subscriptions": 0,
        "total_dunning_subscriptions": 0,
        "subscriptions_today": 2,
        "total_revenue": "€0,00",
        "revenue_today": "€0,00",
        "revenue_this_month": "€0,00",
        "revenue_this_year": "€0,00"
    }
}', true);
    }
}
