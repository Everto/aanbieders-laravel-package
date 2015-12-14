<?php namespace Aanbieders\Api\Traits\Crm;


use Aanbieders\Api\Services\Crm\ComparisonServiceProvider;

trait ComparisonTrait {

    /**
     * @param int $id
     * @return \stdClass
     */
    public function getCrmComparison($id)
    {
        return $this->returnCrmResponse(
            $this->getCrmComparisonServiceProvider()->getComparison($id)
        );
    }


    /**
     * @return ComparisonServiceProvider
     */
    protected function getCrmComparisonServiceProvider()
    {
        if( is_null($this->crmComparisonServiceProvider) ) {
            $this->crmComparisonServiceProvider = new ComparisonServiceProvider();
        }

        return $this->crmComparisonServiceProvider;
    }

}