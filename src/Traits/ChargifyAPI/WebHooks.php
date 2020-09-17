<?php

namespace Srmklive\Chargify\Traits\ChargifyAPI;

use Carbon\Carbon;

trait WebHooks
{
    /**
     * List web hooks for a site.
     *
     * @param string $start
     * @param string $end
     * @param bool   $newest
     * @param int    $page
     * @param int    $per_page
     * @param int    $subscription_id
     *
     * @return array
     */
    public function webhooks_list($start = '', $end = '', $newest = true, $page = 1, $per_page = 200, $subscription_id = 0): array
    {
        $now = Carbon::now();

        $start_date = empty($start) ? $now->subDays(15)->toDateString() : $start;
        $end_date = empty($end) ? $now->toDateString() : $end;
        $order = ($newest === true) ? 'newest_first' : 'oldest_first';
        $subscription_field = $subscription_id > 0 ? "subscription_id={$subscription_id}&" : '';

        $this->apiEndPoint = "/webhooks.json?{$subscription_field}page={$page}&per_page={$per_page}&since_date={$start_date}&until_date={$end_date}&order={$order}";

        $this->verb = 'get';

        return $this->doChargifyRequest();
    }

    /**
     * Replay web hooks for the site.
     *
     * @param array $webhook_ids
     *
     * @return array
     */
    public function webhooks_replay(array $webhook_ids): array
    {
        $this->apiEndPoint = '/webhooks/replay.json';

        $this->options['json'] = ['ids' => $webhook_ids];

        $this->verb = 'post';

        return $this->doChargifyRequest();
    }

    /**
     * Create a new web hook for the site.
     *
     * @param string $url
     * @param array  $events
     *
     * @return array
     */
    public function webhooks_create(string $url, array $events = []): array
    {
        $this->apiEndPoint = '/endpoints.json';

        $this->options['json'] = collect([
            'endpoint' => [
                'url'                   => $url,
                'webhook_subscriptions' => $events,
            ],
        ])->toArray();

        $this->verb = 'post';

        return $this->doChargifyRequest();
    }

    /**
     * Update a new web hook for the site.
     *
     * @param string $webhook_id
     * @param string $url
     * @param array  $events
     *
     * @return array
     */
    public function webhooks_update(string $webhook_id, string $url, array $events = []): array
    {
        $this->apiEndPoint = "/endpoints/{$webhook_id}.json";

        $this->options['json'] = collect([
            'endpoint' => [
                'url'                   => $url,
                'webhook_subscriptions' => $events,
            ],
        ])->toArray();

        $this->verb = 'put';

        return $this->doChargifyRequest();
    }

    /**
     * Get web hook endpoints for the site.
     *
     * @return array
     */
    public function webhooks_endpoints(): array
    {
        $this->apiEndPoint = '/endpoints.json';

        $this->verb = 'get';

        return $this->doChargifyRequest();
    }

    /**
     * Enable web hooks for the site.
     *
     * @return array
     */
    public function webhooks_enable(): array
    {
        $this->apiEndPoint = '/webhooks/settings.json';

        $this->options['json'] = [
            'webhooks_enabled' => true,
        ];
        $this->verb = 'put';

        return $this->doChargifyRequest();
    }
}
