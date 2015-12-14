<?php namespace Aanbieders\Api\Services\Crm;


use Aanbieders\Api\Services\BaseServiceProvider;

class ReferralLeadServiceProvider extends BaseServiceProvider {

    public function createReferralLead($attributes = array())
    {
        return $this->getCurlService()->post( $this->crmBaseUrl .'/referrals', array(), $this->addDefaultAttributes( $attributes ) );
    }

}