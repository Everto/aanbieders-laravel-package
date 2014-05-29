<?php namespace Aanbieders\Api;


use Aanbieders\Api\Exceptions\AanbiedersApiException;

class ApiService {

    protected $productServiceProvider = null;

    protected $supplierServiceProvider = null;

    protected $comparisonServiceProvider = null;

    protected $clientServiceProvider = null;

    protected $orderServiceProvider = null;

    protected $contractServiceProvider = null;


    public function __construct($productServiceProvider, $supplierServiceProvider, $comparisonServiceProvider, $clientServiceProvider, $orderServiceProvider, $contractServiceProvider)
    {
        $this->productServiceProvider = $productServiceProvider;
        $this->supplierServiceProvider = $supplierServiceProvider;
        $this->comparisonServiceProvider = $comparisonServiceProvider;

        $this->clientServiceProvider = $clientServiceProvider;
        $this->orderServiceProvider = $orderServiceProvider;
        $this->contractServiceProvider = $contractServiceProvider;
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


    public function getClient($id)
    {
        return $this->returnCrmResponse(
            $this->clientServiceProvider->getClient($id)
        );
    }

    public function searchClient($query)
    {
        return $this->returnCrmResponse(
            $this->clientServiceProvider->searchClient($query)
        );
    }

    public function createClient($attributes)
    {
        return $this->returnCrmResponse(
            $this->clientServiceProvider->createClient($attributes)
        );
    }


    public function getOrder($id)
    {
        return $this->returnCrmResponse(
            $this->orderServiceProvider->getOrder($id)
        );
    }

    public function createOrder($attributes)
    {
        return $this->returnCrmResponse(
            $this->orderServiceProvider->createOrder($attributes)
        );
    }


    public function getContract($id)
    {
        return $this->returnCrmResponse(
            $this->contractServiceProvider->getContract($id)
        );
    }

    public function createContract($attributes)
    {
        return $this->returnCrmResponse(
            $this->contractServiceProvider->createContract($attributes)
        );
    }


    protected function returnIfSuccessful($response)
    {
        if( is_array($response) || is_object($response) || $response === '' || is_null($response) ) {
            $response = 'Api error : something went wrong while recovering information via the API. Check your parameters for typos or other mistakes.';
        }

        if( strpos($response, 'Api error') !== false || strpos($response, 'is required') !== false ) {
            throw new AanbiedersApiException($response);
        }

        return $response;
    }

    protected function returnCrmResponse($response)
    {
        return json_decode( $response );
    }

}