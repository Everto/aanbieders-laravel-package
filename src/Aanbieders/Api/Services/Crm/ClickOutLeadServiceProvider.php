<?php namespace Aanbieders\Api\Services\Crm;


use Aanbieders\Api\Services\BaseServiceProvider;

class ClickOutLeadServiceProvider extends BaseServiceProvider {

    public function createClickOutLead($attributes = array())
    {
        return $this->getCurlService()->post( $this->crmBaseUrl .'/leads/clickOut', array(), $this->addDefaultAttributes( $attributes ) );
    }

}