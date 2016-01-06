<?php namespace Aanbieders\Api\Traits\Crm;


use Aanbieders\Api\Services\Crm\ClickOutLeadServiceProvider;

trait ClickOutLeadTrait {

    /**
     * @param array $attributes
     * @return \stdClass
     */
    public function createClickOutLead($attributes)
    {
        return $this->returnCrmResponse(
            $this->getClickOutLeadServiceProvider()->createClickOutLead($attributes)
        );
    }


    /**
     * @return ClickOutLeadServiceProvider
     */
    protected function getClickOutLeadServiceProvider()
    {
        if( is_null($this->clickOutLeadServiceProvider) ) {
            $this->clickOutLeadServiceProvider = new ClickOutLeadServiceProvider();
        }

        return $this->clickOutLeadServiceProvider;
    }

}