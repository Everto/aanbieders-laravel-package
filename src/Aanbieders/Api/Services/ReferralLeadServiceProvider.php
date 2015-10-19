<?php namespace Aanbieders\Api\Services;


class ReferralLeadServiceProvider extends BaseServiceProvider {

    public function createReferralLead($attributes = array())
    {
        return $this->getCurlService()->post( $this->crmBaseUrl .'/referrals', array(), $this->addDefaultAttributes( $attributes ) );
    }

}