<?php
/**
 * Chargify Settings
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

return [
    'mode'    => env('CHARGIFY_MODE', 'sandbox'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'sandbox' => [
        'public_key'    => env('CHARGIFY_SANDBOX_PUBLIC_KEY', ''),
        'private_key'   => env('CHARGIFY_SANDBOX_PRIVATE_KEY', ''),
        'api_key'       => env('CHARGIFY_SANDBOX_API_KEY', ''),
        'site'          => env('CHARGIFY_SANDBOX_SITE_URL', ''),
    ],
    'live' => [
        'public_key'    => env('CHARGIFY_LIVE_PUBLIC_KEY', ''),
        'private_key'   => env('CHARGIFY_LIVE_PRIVATE_KEY', ''),
        'api_key'       => env('CHARGIFY_LIVE_API_KEY', ''),
        'site'          => env('CHARGIFY_LIVE_SITE_URL', ''),
    ],
    'currency' => env('CHARGIFY_CURRENCY', 'USD'),
];
