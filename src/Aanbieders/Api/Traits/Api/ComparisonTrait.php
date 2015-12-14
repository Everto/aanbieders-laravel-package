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
            $this->getApiComparisonServiceProvider()->getComparisons($params)
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
            $this->getApiComparisonServiceProvider()->readComparison($params, $comparisonId)
        );
    }


    /**
     * @return ComparisonServiceProvider
     */
    protected function getApiComparisonServiceProvider()
    {
        if( is_null($this->apiComparisonServiceProvider) ) {
            $this->apiComparisonServiceProvider = new ComparisonServiceProvider();
        }

        return $this->apiComparisonServiceProvider;
    }

}