<?php namespace Aanbieders\Api\Services\Crm;


use Aanbieders\Api\Services\BaseServiceProvider;

class ReferralLeadServiceProvider extends BaseServiceProvider {

    public function createReferralLead($attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/referrals' )
            ->withData( $this->addDefaultAttributes( $attributes ) )
            ->post();
    }

}