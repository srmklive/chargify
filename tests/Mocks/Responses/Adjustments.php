<?php

namespace Srmklive\Chargify\Tests\Mocks\Responses;

trait Adjustments
{
    protected function mockAdjustSubscriptionResponse(): array
    {
        return \GuzzleHttp\json_decode('{
	"adjustment": {
		"amount_in_cents": "-400",
        "memo": "Giving balance"
	}
}', true);
    }
}
