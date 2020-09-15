<?php

namespace Srmklive\Chargify\Tests\Mocks\Responses;

trait Transactions
{
    /**
     * @return array
     */
    protected function mockListTransactionsResponse()
    {
        return \GuzzleHttp\json_decode('
[
    {
        "transaction": {
            "id": 420716894,
            "subscription_id": 35827797,
            "type": "Charge",
            "kind": "baseline",
            "transaction_type": "charge",
            "success": true,
            "amount_in_cents": 0,
            "memo": "TYF Trial (14 Sep 2020 - 7 Dec 2020)",
            "created_at": "2020-09-14T12:26:34+02:00",
            "starting_balance_in_cents": 0,
            "ending_balance_in_cents": 0,
            "gateway_used": null,
            "gateway_transaction_id": null,
            "gateway_order_id": null,
            "payment_id": null,
            "product_id": 5272615,
            "tax_id": null,
            "component_id": null,
            "statement_id": 198668824,
            "customer_id": 36827975,
            "item_name": "TYF Trial",
            "period_range_start": "2020-09-14",
            "period_range_end": "2020-12-07",
            "currency": "USD",
            "exchange_rate": "1.185486",
            "quantity": "1.0",
            "original_amount_in_cents": 0,
            "discount_amount_in_cents": 0,
            "taxable_amount_in_cents": null,
            "price_point_id": 989619,
            "price_point_handle": null,
            "taxations": []
        }
    }
]', true);
    }
}
