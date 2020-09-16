<?php

namespace Srmklive\Chargify\Tests\Mocks\Responses;

trait Adjustments
{
    /**
     * @return array
     */
    protected function mockAdjustSubscriptionResponse()
    {
        return \GuzzleHttp\json_decode('{
	"adjustment": {
		"amount_in_cents": "-400",
        "memo": "Giving balance"
	}
}', true);
    }
}
