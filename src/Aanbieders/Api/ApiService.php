<?php namespace Aanbieders\Api;


use Aanbieders\Api\Services\ProductServiceProvider;
use Aanbieders\Api\Services\SupplierServiceProvider;
use Aanbieders\Api\Services\ComparisonServiceProvider;

class ApiService {

    protected $productServiceProvider = null;

    protected $supplierServiceProvider = null;

    protected $comparisonServiceProvider = null;


    public function __construct(ProductServiceProvider $productServiceProvider, SupplierServiceProvider $supplierServiceProvider, ComparisonServiceProvider $comparisonServiceProvider)
    {
        $this->productServiceProvider = $productServiceProvider;
        $this->supplierServiceProvider = $supplierServiceProvider;
        $this->comparisonServiceProvider = $comparisonServiceProvider;
    }


    public function getProducts($params, $productIds = array())
    {
        return $this->productServiceProvider->getProducts( $params, $productIds );
    }

    public function getProduct($params, $productId)
    {
        return $this->productServiceProvider->getProduct( $params, $productId );
    }


    public function getSuppliers($params, $productIds = array())
    {
        return $this->supplierServiceProvider->getSuppliers( $params, $productIds );
    }

    public function getSupplier($params, $productId)
    {
        return $this->supplierServiceProvider->getSupplier( $params, $productId );
    }


    public function getComparisons($params)
    {
        return $this->comparisonServiceProvider->getComparisons($params);
    }

}