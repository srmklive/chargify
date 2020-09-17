<?php

namespace Srmklive\Chargify\Traits\ChargifyAPI;

trait Sites
{
    /**
     * @return array
     */
    public function site_read()
    {
        $this->apiEndPoint = '/site.json';

        $this->verb = 'get';

        return $this->doChargifyRequest();
    }

    /**
     * Clear site data.
     *
     * @param string $scope
     *
     * @return array
     */
    public function site_clear_data($scope = 'all')
    {
        $this->apiEndPoint = "/sites/clear_data.json?cleanup_scope={$scope}";

        $this->verb = 'post';

        return $this->doChargifyRequest(false);
    }
}
