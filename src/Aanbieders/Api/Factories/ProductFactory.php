<?php namespace Aanbieders\Api\Factories;


use Aanbieders\Api\Models\Product;

class ProductFactory {

    public function createProducts(array $productsInfo)
    {
        $products = array();
        foreach( $productsInfo as $item ) {
            array_push( $products, $this->createProduct($item) );
        }

        return $products;
    }

    public function createProduct($productInfo)
    {
        $product = new Product();
        $product->id = $productInfo['product_id'];
        $product->type = $productInfo['producttype'];
        $product->name = $productInfo['product_name'];

        $product->group_id = $productInfo['group_id'];
        $product->segment = $productInfo['segment'];
        $product->updated = $productInfo['last_update'];

        $product->supplier_id = $productInfo['supplier_id'];
        $product->supplier_name = $productInfo['supplier_name'];

        $product->status = $productInfo['status'];
        $product->status_code = $productInfo['status_code'];

        $product->monthly_fee = $productInfo['monthly_fee'];
        $product->contract_periods = $productInfo['contract_periods'];
        $product->availability = $productInfo['availability'];

        $product->specifications = $productInfo['specifications'];
        $product->texts = $productInfo['texts'];
        $product->links = $productInfo['links'];
        $product->reviews = $productInfo['reviews'];

        $product->options = $productInfo['options'];
        $product->promotions = $productInfo['promotions'];
        $product->attachments = $productInfo['attachments'];

        $product->commission = $productInfo['commission'];
        $product->commissioning = $productInfo['commissioning'];
        $product->order_preferences = $productInfo['order_preferences'];
        $product->price = $productInfo['price'];

        return $product;
    }

}