<?php namespace Aanbieders\Api\Services;


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

        return $products[0];
    }

}