<?php namespace Aanbieders\Api;


use Aanbieders\Api\Exceptions\AanbiedersApiException;

class ApiService {

    protected $productServiceProvider = null;

    protected $supplierServiceProvider = null;

    protected $comparisonServiceProvider = null;


    public function __construct($productServiceProvider, $supplierServiceProvider, $comparisonServiceProvider)
    {
        $this->productServiceProvider = $productServiceProvider;
        $this->supplierServiceProvider = $supplierServiceProvider;
        $this->comparisonServiceProvider = $comparisonServiceProvider;
    }


    public function getProducts($params, $productIds = array())
    {
        return $this->returnIfSuccessful(
            $this->productServiceProvider->getProducts( $params, $productIds )
        );
    }

    public function getProduct($params, $productId)
    {
        return $this->returnIfSuccessful(
            $this->productServiceProvider->getProduct( $params, $productId )
        );
    }


    public function getSuppliers($params, $productIds = array())
    {
        return $this->returnIfSuccessful(
            $this->supplierServiceProvider->getSuppliers( $params, $productIds )
        );
    }

    public function getSupplier($params, $productId)
    {
        return $this->returnIfSuccessful(
            $this->supplierServiceProvider->getSupplier( $params, $productId )
        );
    }


    public function getComparisons($params)
    {
        return $this->returnIfSuccessful(
            $this->comparisonServiceProvider->getComparisons($params)
        );
    }

    protected function returnIfSuccessful($response)
    {
        if( is_array($response) || is_object($response) ) {
            return $response;
        }

        if( is_null($response) ) {
            $response = 'Api error : something went wrong while recovering information via the API. Check your parameters for typos or other mistakes.';
        }

        throw new AanbiedersApiException($response);
    }

}