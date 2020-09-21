<?php

namespace Srmklive\Chargify\Tests\Mocks\Responses;

trait Customers
{
    protected function mockCustomerDetailsResponse(): array
    {
        return \GuzzleHttp\json_decode('{
  "customer": {
    "first_name": "Martha",
    "last_name": "Washington",
    "email": "martha@example.com",
    "cc_emails": "john@example.com, sue@example.com",
    "organization": null,
    "reference": null,
    "id": 14967442,
    "created_at": "2016-12-05T10:33:07-05:00",
    "updated_at": "2016-12-05T10:33:07-05:00",
    "address": null,
    "address_2": null,
    "city": null,
    "state": null,
    "zip": null,
    "country": null,
    "phone": null,
    "verified": false,
    "portal_customer_created_at": null,
    "portal_invite_last_sent_at": null,
    "portal_invite_last_accepted_at": null,
    "tax_exempt": false,
    "vat_number": "012345678"
  }
}', true);
    }

    protected function mockCustomerListResponse(): array
    {
        return \GuzzleHttp\json_decode('[
  {
    "customer": {
      "first_name": "Kayla",
      "last_name": "Test",
      "email": "kayla@example.com",
      "cc_emails": "john@example.com, sue@example.com",
      "organization": "",
      "reference": null,
      "id": 14126091,
      "created_at": "2016-10-04T15:22:27-04:00",
      "updated_at": "2016-10-04T15:22:30-04:00",
      "address": "",
      "address_2": "",
      "city": "",
      "state": "",
      "zip": "",
      "country": "",
      "phone": "",
      "verified": null,
      "portal_customer_created_at": "2016-10-04T15:22:29-04:00",
      "portal_invite_last_sent_at": "2016-10-04T15:22:30-04:00",
      "portal_invite_last_accepted_at": null,
      "tax_exempt": false
    }
  },
  {
    "customer": {
      "first_name": "Nick ",
      "last_name": "Test",
      "email": "nick@example.com",
      "cc_emails": "john@example.com, sue@example.com",
      "organization": "",
      "reference": null,
      "id": 14254093,
      "created_at": "2016-10-13T16:52:51-04:00",
      "updated_at": "2016-10-13T16:52:54-04:00",
      "address": "",
      "address_2": "",
      "city": "",
      "state": "",
      "zip": "",
      "country": "",
      "phone": "",
      "verified": null,
      "portal_customer_created_at": "2016-10-13T16:52:54-04:00",
      "portal_invite_last_sent_at": "2016-10-13T16:52:54-04:00",
      "portal_invite_last_accepted_at": null,
      "tax_exempt": false,
      "parent_id": 123
    }
  },
  {
    "customer": {
      "first_name": "Don",
      "last_name": "Test",
      "email": "don@example.com",
      "cc_emails": "john@example.com, sue@example.com",
      "organization": "",
      "reference": null,
      "id": 14332342,
      "created_at": "2016-10-19T10:49:13-04:00",
      "updated_at": "2016-10-19T10:49:19-04:00",
      "address": "1737 15th St",
      "address_2": "",
      "city": "Boulder",
      "state": "CO",
      "zip": "80302",
      "country": "US",
      "phone": "",
      "verified": null,
      "portal_customer_created_at": "2016-10-19T10:49:19-04:00",
      "portal_invite_last_sent_at": "2016-10-19T10:49:19-04:00",
      "portal_invite_last_accepted_at": null,
      "tax_exempt": false,
      "parent_id": null
    }
  }
]', true);
    }

    protected function mockCustomerSubscriptionsResponse(): array
    {
        return \GuzzleHttp\json_decode('[
  {
    "subscription": {
      "id": 14950975,
      "state": "active",
      "balance_in_cents": 0,
      "total_revenue_in_cents": 22500,
      "product_price_in_cents": 7500,
      "product_version_number": 1,
      "current_period_ends_at": "2017-10-27T16:40:38-04:00",
      "next_assessment_at": "2017-10-27T16:40:38-04:00",
      "trial_started_at": null,
      "trial_ended_at": null,
      "activated_at": "2016-10-27T12:06:32-04:00",
      "expires_at": null,
      "created_at": "2016-10-27T12:06:30-04:00",
      "updated_at": "2016-11-18T13:22:53-05:00",
      "cancellation_message": null,
      "cancellation_method": null,
      "cancel_at_end_of_period": false,
      "canceled_at": null,
      "current_period_started_at": "2016-10-27T16:40:38-04:00",
      "previous_state": "active",
      "signup_payment_id": 159783974,
      "signup_revenue": "75.00",
      "delayed_cancel_at": null,
      "coupon_code": null,
      "payment_collection_method": "automatic",
      "snap_day": null,
      "customer": {
        "first_name": "Martha",
        "last_name": "Example",
        "email": "marthw@example.com",
        "cc_emails": "",
        "organization": "",
        "reference": null,
        "id": 14451040,
        "created_at": "2016-10-27T12:05:23-04:00",
        "updated_at": "2016-12-05T10:53:37-05:00",
        "address": "123 Anywhere Street",
        "address_2": "",
        "city": "Boston",
        "state": "MA",
        "zip": "02120",
        "country": "US",
        "phone": "",
        "verified": false,
        "portal_customer_created_at": "2016-10-27T12:05:25-04:00",
        "portal_invite_last_sent_at": "2016-10-27T12:06:32-04:00",
        "portal_invite_last_accepted_at": null,
        "tax_exempt": false,
        "vat_number": "012345678"
      },
      "product": {
        "id": 4298069,
        "name": "ANNUAL product",
        "handle": "annual-product-test",
        "description": "",
        "accounting_code": "",
        "price_in_cents": 7500,
        "interval": 12,
        "interval_unit": "month",
        "initial_charge_in_cents": null,
        "expiration_interval": null,
        "expiration_interval_unit": "never",
        "trial_price_in_cents": null,
        "trial_interval": null,
        "trial_interval_unit": "month",
        "initial_charge_after_trial": false,
        "return_params": "",
        "request_credit_card": true,
        "require_credit_card": true,
        "created_at": "2016-10-27T11:59:59-04:00",
        "updated_at": "2016-10-27T11:59:59-04:00",
        "archived_at": null,
        "update_return_url": "",
        "update_return_params": "",
        "product_family": {
          "id": 528484,
          "name": "Products",
          "handle": "wild-about-animals",
          "accounting_code": null,
          "description": "Products"
        },
        "public_signup_pages": [
          {
            "id": 299848,
            "url": "https://general-goods.chargify.com/subscribe/pxfxqcgz8pq8/annual-product-test"
          }
        ],
        "taxable": false,
        "version_number": 1
      },
      "credit_card": {
        "id": 10228039,
        "payment_type": "credit_card",
        "first_name": "Example",
        "last_name": "Exampe",
        "masked_card_number": "XXXX-XXXX-XXXX-1",
        "card_type": "bogus",
        "expiration_month": 1,
        "expiration_year": 2018,
        "billing_address": "",
        "billing_address_2": "",
        "billing_city": "",
        "billing_state": "",
        "billing_country": "",
        "billing_zip": "",
        "current_vault": "bogus",
        "vault_token": "1",
        "customer_vault_token": null,
        "customer_id": 14451040
      },
      "payment_type": "credit_card",
      "referral_code": "9652hf",
      "next_product_id": null,
      "coupon_use_count": null,
      "coupon_uses_allowed": null
    }
  },
  {
    "subscription": {
      "id": 14950962,
      "state": "past_due",
      "balance_in_cents": 1000,
      "total_revenue_in_cents": 3000,
      "product_price_in_cents": 1000,
      "product_version_number": 1,
      "current_period_ends_at": "2016-12-27T15:42:19-05:00",
      "next_assessment_at": "2016-12-05T18:22:22-05:00",
      "trial_started_at": null,
      "trial_ended_at": null,
      "activated_at": "2016-10-27T12:05:24-04:00",
      "expires_at": null,
      "created_at": "2016-10-27T12:05:23-04:00",
      "updated_at": "2016-12-04T18:22:22-05:00",
      "cancellation_message": null,
      "cancellation_method": null,
      "cancel_at_end_of_period": false,
      "canceled_at": null,
      "current_period_started_at": "2016-11-27T15:42:19-05:00",
      "previous_state": "past_due",
      "signup_payment_id": 159783933,
      "signup_revenue": "10.00",
      "delayed_cancel_at": null,
      "coupon_code": null,
      "payment_collection_method": "automatic",
      "snap_day": null,
      "customer": {
        "first_name": "Martha",
        "last_name": "Example",
        "email": "marthw@example.com",
        "cc_emails": "",
        "organization": "",
        "reference": null,
        "id": 14451040,
        "created_at": "2016-10-27T12:05:23-04:00",
        "updated_at": "2016-12-05T10:53:37-05:00",
        "address": "123 Anywhere Street",
        "address_2": "",
        "city": "Boston",
        "state": "MA",
        "zip": "02120",
        "country": "US",
        "phone": "",
        "verified": false,
        "portal_customer_created_at": "2016-10-27T12:05:25-04:00",
        "portal_invite_last_sent_at": "2016-10-27T12:06:32-04:00",
        "portal_invite_last_accepted_at": null,
        "tax_exempt": false,
        "vat_number": "012345678"
      },
      "product": {
        "id": 4298068,
        "name": "Platinum Plan",
        "handle": "platinum123",
        "description": "This is our platinum plan.",
        "accounting_code": "123",
        "price_in_cents": 1000,
        "interval": 1,
        "interval_unit": "month",
        "initial_charge_in_cents": null,
        "expiration_interval": null,
        "expiration_interval_unit": "never",
        "trial_price_in_cents": null,
        "trial_interval": null,
        "trial_interval_unit": "month",
        "initial_charge_after_trial": false,
        "return_params": "",
        "request_credit_card": true,
        "require_credit_card": true,
        "created_at": "2016-10-27T11:58:02-04:00",
        "updated_at": "2016-11-04T16:55:23-04:00",
        "archived_at": null,
        "update_return_url": "",
        "update_return_params": "",
        "product_family": {
          "id": 528484,
          "name": "Products",
          "handle": "wild-about-animals",
          "accounting_code": null,
          "description": "Products"
        },
        "public_signup_pages": [
          {
            "id": 299847,
            "url": "https://general-goods.chargify.com/subscribe/s5bc5q6gjftv/platinum123"
          }
        ],
        "taxable": false,
        "version_number": 1
      },
      "credit_card": {
        "id": 10228046,
        "payment_type": "credit_card",
        "first_name": "Example",
        "last_name": "Example",
        "masked_card_number": "XXXX-XXXX-XXXX-2",
        "card_type": "bogus",
        "expiration_month": 2,
        "expiration_year": 2018,
        "billing_address": "",
        "billing_address_2": "",
        "billing_city": "",
        "billing_state": "",
        "billing_country": "",
        "billing_zip": "",
        "current_vault": "bogus",
        "vault_token": "2",
        "customer_vault_token": null,
        "customer_id": 14451040
      },
      "payment_type": "credit_card",
      "referral_code": "gkgb6g",
      "next_product_id": null,
      "coupon_use_count": null,
      "coupon_uses_allowed": null
    }
  }
]', true);
    }
}
