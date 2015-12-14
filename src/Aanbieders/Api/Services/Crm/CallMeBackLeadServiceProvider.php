<?php namespace Aanbieders\Api\Services\Crm;


use Aanbieders\Api\Services\BaseServiceProvider;

class CallMeBackLeadServiceProvider extends BaseServiceProvider {

    public function createCallMeBackLead($attributes = array())
    {
        return $this->getCurlService()->post( $this->crmBaseUrl .'/leads', array(), $this->addDefaultAttributes( $attributes ) );
    }

}