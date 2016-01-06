<?php namespace Aanbieders\Api\Traits\Crm;


use Aanbieders\Api\Services\Crm\CallMeBackLeadServiceProvider;

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
            $this->callMeBackLeadServiceProvider = new CallMeBackLeadServiceProvider();
        }

        return $this->callMeBackLeadServiceProvider;
    }

}