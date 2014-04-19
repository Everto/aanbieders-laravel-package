<?php namespace Aanbieders\Api\Services;


use Aanbieders\Api\Factories\ProductFactory;
use Aanbieders\Api\Models\Product;

class ProductServiceProvider {

    public function __construct(ProductFactory $productFactory = null)
    {
        if( is_null( $productFactory ) ) {
            $productFactory = new ProductFactory();
        }

        $this->productFactory = $productFactory;
    }


    public function getProducts()
    {
        // ToDo: Create request
        $response = null;

        // ToDo: Create request
        $products = $this->productFactory->createProducts( $response );

        return $products;
    }

    public function getProduct()
    {
        // ToDo: Create request
        $response = null;

        // ToDo: Create request
        $product = $this->productFactory->createProducts( $response );

        return $product;
    }

}