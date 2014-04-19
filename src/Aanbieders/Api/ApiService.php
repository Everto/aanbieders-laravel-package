<?php namespace Aanbieders\Api;


use Aanbieders\Api\Services\ProductServiceProvider;
use Aanbieders\Api\Services\SupplierServiceProvider;

class ApiService {

    protected $productServiceProvider = null;

    protected $supplierServiceProvider = null;


    public function __construct(ProductServiceProvider $productServiceProvider, SupplierServiceProvider $supplierServiceProvider)
    {
        $this->productServiceProvider = $productServiceProvider;
        $this->supplierServiceProvider = $supplierServiceProvider;
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

}