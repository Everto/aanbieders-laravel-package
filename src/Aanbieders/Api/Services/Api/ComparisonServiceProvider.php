<?php namespace Aanbieders\Api\Services\Api;


use Aanbieders\Api\Services\BaseServiceProvider;

class ComparisonServiceProvider extends BaseServiceProvider {

    public function __construct()
    {
        //
    }


    public function getComparisons($params)
    {
        $comparisons = $this->getApiClient()->compare( $params );

        return $comparisons;
    }

    public function readComparison($params, $comparisonId)
    {
        $comparison = $this->getApiClient()->readComparison( $params, $comparisonId );

        return $comparison;
    }
}