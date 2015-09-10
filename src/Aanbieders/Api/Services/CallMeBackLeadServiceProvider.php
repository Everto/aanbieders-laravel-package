<?php namespace Aanbieders\Api\Services;


class CallMeBackLeadServiceProvider extends BaseServiceProvider {

    public function createCallMeBackLead($attributes = array())
    {
        return $this->getCurlService()->post( $this->crmBaseUrl .'/leads', array(), $this->addDefaultAttributes( $attributes ) );
    }

}