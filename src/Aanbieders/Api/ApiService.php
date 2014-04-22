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


    public function getProducts($category, $segment = 'consumer', $language = 'nl', $productIds = array())
    {
        return $this->productServiceProvider->getProducts($category, $segment, $language, $productIds);
    }

    public function getProduct($category, $segment = 'consumer', $language = 'nl', $productId)
    {
        return $this->productServiceProvider->getProduct($category, $segment, $language, $productId);
    }


    public function getSuppliers($category, $segment = 'consumer', $language = 'nl', $productIds = array())
    {
        return $this->supplierServiceProvider->getSuppliers($category, $segment, $language, $productIds);
    }

    public function getSupplier($category, $segment = 'consumer', $language = 'nl', $productId)
    {
        return $this->supplierServiceProvider->getSupplier($category, $segment, $language, $productId);
    }


    public function getComparisons($params = array())
    {
        return $this->comparisonServiceProvider->getComparisons($params);
    }

}