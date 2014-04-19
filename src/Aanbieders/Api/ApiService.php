<?php namespace Aanbieders\Api;


use Aanbieders\Api\Services\ProductServiceProvider;

class ApiService {

    protected $productServiceProvider = null;


    public function __construct(ProductServiceProvider $productServiceProvider)
    {
        $this->productServiceProvider = $productServiceProvider;
    }


    public function getProducts()
    {
        return $this->productServiceProvider->getProducts();
    }

    public function getProduct()
    {
        return $this->productServiceProvider->getProduct();
    }

}