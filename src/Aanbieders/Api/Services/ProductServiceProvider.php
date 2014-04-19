<?php namespace Aanbieders\Api\Services;


use Aanbieders\Api\Factories\ProductFactory;

class ProductServiceProvider extends BaseServiceProvider {

    public function __construct(ProductFactory $productFactory = null)
    {
        if( is_null( $productFactory ) ) {
            $productFactory = new ProductFactory();
        }

        $this->productFactory = $productFactory;
    }


    public function getProducts($category, $segment = 'consumer', $language = 'nl', $productIds = array())
    {
        $response = $this->getApiClient()->getProducts(
            array(
                'cat'       => $category,
                'sg'        => $segment,
                'lang'      => $language
            ), $productIds
        );

        $products = $this->productFactory->createProducts( $response );

        return $products;
    }

    public function getProduct($category, $segment = 'consumer', $language = 'nl', $productId)
    {
        $response = $this->getApiClient()->getProducts(
            array(
                'cat'       => $category,
                'sg'        => $segment,
                'lang'      => $language
            ), $productId
        );

        $products = $this->productFactory->createProducts( $response );

        return $products[0];
    }

}