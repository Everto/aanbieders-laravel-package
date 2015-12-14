<?php namespace Aanbieders\Api\Services\Crm;


use Aanbieders\Api\Services\BaseServiceProvider;

class ClickOutLeadServiceProvider extends BaseServiceProvider {

    public function createClickOutLead($attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/leads/clickOut' )
            ->withData( $this->addDefaultAttributes( $attributes ) )
            ->post();
    }

}