<?php namespace Aanbieders\Api\Traits;


use Aanbieders\Api\Services\AffiliateServiceProvider;
use Aanbieders\Api\Exceptions\AanbiedersApiException;

trait AffiliateTrait {

    /**
     * @param array $params
     * @param array $affiliateIds
     * @return \stdClass
     * @throws AanbiedersApiException
     */
    public function getAffiliates($params, $affiliateIds = array())
    {
        return $this->returnIfSuccessful(
            $this->getAffiliateServiceProvider()->getAffiliates( $params, $affiliateIds )
        );
    }

    /**
     * @param array $params
     * @param int $affiliateId
     * @return \stdClass
     * @throws AanbiedersApiException
     */
    public function getAffiliate($params, $affiliateId)
    {
        return $this->returnIfSuccessful(
            $this->getAffiliateServiceProvider()->getAffiliate( $params, $affiliateId )
        );
    }


    /**
     * @return AffiliateServiceProvider
     */
    protected function getAffiliateServiceProvider()
    {
        if( is_null($this->affiliateServiceProvider) ) {
            $this->affiliateServiceProvider = new AffiliateServiceProvider( $this->config->get('Api::baseUrl') );
        }

        return $this->affiliateServiceProvider;
    }

}