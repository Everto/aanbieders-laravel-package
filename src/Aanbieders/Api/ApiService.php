<?php namespace Aanbieders\Api;


use Aanbieders\Api\Services\ProductServiceProvider;

class ApiService {

    protected $productServiceProvider = null;


    public function __construct(ProductServiceProvider $productServiceProvider)
    {
        $this->productServiceProvider = $productServiceProvider;
    }


    public function getProducts($category, $segment = 'consumer', $language = 'nl', $productIds = array())
    {
        return $this->productServiceProvider->getProducts($category, $segment, $language, $productIds);
    }

    public function getProduct($category, $segment = 'consumer', $language = 'nl', $productId)
    {
        return $this->productServiceProvider->getProduct($category, $segment, $language, $productId);
    }

}