<?php

namespace Srmklive\Chargify\Tests\Mocks\Responses;

trait BillingPortal
{
    protected function mockCustomerBillingPortalDetailsResponse(): array
    {
        return \GuzzleHttp\json_decode('{
  "url": "https://www.billingportal.com/manage/19804639/1517596469/bd16498719a7d3e6",
  "fetch_count": 1,
  "created_at": "2018-02-02T18:34:29Z",
  "new_link_available_at": "2018-02-17T18:34:29Z",
  "expires_at": "2018-04-08T17:34:29Z"
}', true);
    }

    protected function mockRevokeCustomerBillingPortalResponse(): array
    {
        return \GuzzleHttp\json_decode('{
  "last_sent_at": "Not Invited",
  "last_accepted_at": "Invite Revoked",
  "uninvited_count": 8
}', true);
    }
}
