<?php

namespace Srmklive\Chargify\Tests\Mocks\Requests;

trait Customers
{
    protected function mockCustomerParams(): array
    {
        return \GuzzleHttp\json_decode('{
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
', true);
    }
}
