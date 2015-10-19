<?php namespace Aanbieders\Api\Traits;


use Aanbieders\Api\Services\ReferralLeadServiceProvider;

trait ReferralLeadTrait {

    /**
     * @param array $attributes
     * @return \stdClass
     */
    public function createReferralLead($attributes)
    {
        return $this->returnCrmResponse(
            $this->getReferralLeadServiceProvider()->createReferralLead($attributes)
        );
    }


    /**
     * @return ReferralLeadServiceProvider
     */
    protected function getReferralLeadServiceProvider()
    {
        if( is_null($this->referralLeadServiceProvider) ) {
            $this->referralLeadServiceProvider = new ReferralLeadServiceProvider( $this->config->get('Api::baseUrl') );
        }

        return $this->referralLeadServiceProvider;
    }

}