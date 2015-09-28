<?php namespace Aanbieders\Api\Traits;


use Aanbieders\Api\Services\CallMeBackLeadServiceProvider;

trait CallMeBackLeadTrait {

    /**
     * @param array $attributes
     * @return \stdClass
     */
    public function createCallMeBackLead($attributes)
    {
        return $this->returnCrmResponse(
            $this->getCallMeBackLeadServiceProvider()->createCallMeBackLead($attributes)
        );
    }


    /**
     * @return CallMeBackLeadServiceProvider
     */
    protected function getCallMeBackLeadServiceProvider()
    {
        if( is_null($this->callMeBackLeadServiceProvider) ) {
            $this->callMeBackLeadServiceProvider = new CallMeBackLeadServiceProvider( $this->config->get('Api::baseUrl') );
        }

        return $this->callMeBackLeadServiceProvider;
    }

}