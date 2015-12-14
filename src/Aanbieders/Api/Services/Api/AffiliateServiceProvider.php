<?php namespace Aanbieders\Api\Services\Api;


use Aanbieders\Api\Services\BaseServiceProvider;

class AffiliateServiceProvider extends BaseServiceProvider {

    public function __construct($baseUrl = null)
    {
        parent::__construct($baseUrl);
    }

    
    public function getAffiliates($params, $affiliateIds = array())
    {
        $params['affiliate_id'] = $affiliateIds;
        return $this->getApiClient()->getAffiliates( $params );
    }

    public function getAffiliate($params, $affiliateId)
    {
        $params['affiliate_id'] = array($affiliateId);
        $affiliates = $this->getApiClient()->getAffiliates( $params );

        return substr($affiliates, 1, -1);
    }

}