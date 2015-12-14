<?php namespace Aanbieders\Api\Services\Api;


use Aanbieders\Api\Services\BaseServiceProvider;

class ProductServiceProvider extends BaseServiceProvider {

    public function __construct()
    {
        //
    }


    public function getProducts($params, $productIds = array())
    {
        $products = $this->getApiClient()->getProducts( $params, $productIds );

        return $products;
    }

    public function getProduct($params, $productId)
    {
        $products = $this->getApiClient()->getProducts( $params, $productId );

        return substr($products, 1, -1);
    }

}