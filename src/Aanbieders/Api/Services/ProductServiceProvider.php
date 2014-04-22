<?php namespace Aanbieders\Api\Services;


class ProductServiceProvider extends BaseServiceProvider {

    public function __construct()
    {
        //
    }


    public function getProducts($category, $segment = 'consumer', $language = 'nl', $productIds = array())
    {
        $products = $this->getApiClient()->getProducts(
            array(
                'cat'       => $category,
                'sg'        => $segment,
                'lang'      => $language
            ), $productIds
        );

        return $products;
    }

    public function getProduct($category, $segment = 'consumer', $language = 'nl', $productId)
    {
        $products = $this->getApiClient()->getProducts(
            array(
                'cat'       => $category,
                'sg'        => $segment,
                'lang'      => $language
            ), $productId
        );

        return $products[0];
    }

}