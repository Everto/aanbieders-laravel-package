<?php namespace Aanbieders\Api\Services;


class ComparisonServiceProvider extends BaseServiceProvider {

    public function __construct()
    {
        //
    }


    public function getComparisons($params)
    {
        $products = $this->getApiClient()->compare( $params );

        return $products;
    }

}