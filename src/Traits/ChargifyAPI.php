<?php

namespace Srmklive\Chargify\Traits;

trait ChargifyAPI
{
    use ChargifyAPI\Adjustments;
    use ChargifyAPI\BillingPortal;
    use ChargifyAPI\Customers;
    use ChargifyAPI\Products;
    use ChargifyAPI\ProductsFamilies;
    use ChargifyAPI\ProductsPricePoints;
    use ChargifyAPI\Sites;
    use ChargifyAPI\Stats;
    use ChargifyAPI\Transactions;
    use ChargifyAPI\WebHooks;
}
