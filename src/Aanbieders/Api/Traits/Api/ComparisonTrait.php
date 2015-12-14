<?php namespace Aanbieders\Api\Traits\Api;


use Aanbieders\Api\Services\Api\ComparisonServiceProvider;
use Aanbieders\Api\Exceptions\AanbiedersApiException;

trait ComparisonTrait {

    /**
     * @param array $params
     * @return \stdClass
     * @throws AanbiedersApiException
     */
    public function getComparisons($params)
    {
        return $this->returnIfSuccessful(
            $this->getComparisonServiceProvider()->getComparisons($params)
        );
    }

    /**
     * @param array $params
     * @param int $comparisonId
     * @return \stdClass
     * @throws AanbiedersApiException
     */
    public function readComparison($params, $comparisonId)
    {
        return $this->returnIfSuccessful(
            $this->getComparisonServiceProvider()->readComparison($params, $comparisonId)
        );
    }


    /**
     * @return ComparisonServiceProvider
     */
    protected function getComparisonServiceProvider()
    {
        if( is_null($this->comparisonServiceProvider) ) {
            $this->comparisonServiceProvider = new ComparisonServiceProvider();
        }

        return $this->comparisonServiceProvider;
    }

}