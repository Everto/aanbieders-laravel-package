<?php namespace Aanbieders\Api\Factories;


use Aanbieders\Api\Models\Product;

class ProductFactory extends BaseFactory {

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
        $product->id = $this->getAttribute('product_id', $productInfo, 0);
        $product->type = $this->getAttribute('producttype', $productInfo, '');
        $product->name = $this->getAttribute('product_name', $productInfo, '');

        $product->group_id = $this->getAttribute('group_id', $productInfo, 0);
        $product->segment = $this->getAttribute('segment', $productInfo, 'segment', '');
        $product->updated = $this->getAttribute('last_update', $productInfo, '');

        $product->supplier = $this->createSupplier($productInfo);

        $product->status = $this->getAttribute('status', $productInfo, '');
        $product->status_code = $this->getAttribute('status_code', $productInfo, 0);

        $product->monthly_fee = $this->getAttribute('monthly_fee', $productInfo, array());
        $product->contract_periods = $this->getAttribute('contract_periods', $productInfo, array());
        $product->availability = $this->getAttribute('availability', $productInfo, array());

        $product->specifications = $this->getAttribute('specifications', $productInfo, array());
        $product->texts = $this->getAttribute('texts', $productInfo, array());
        $product->links = $this->getAttribute('links', $productInfo, array());
        $product->reviews = $this->getAttribute('reviews', $productInfo, array());

        $product->options = $this->getAttribute('options', $productInfo, array());
        $product->promotions = $this->createPromotions($productInfo);
        $product->attachments = $this->getAttribute('attachments', $productInfo, array());

        $product->commission = $this->getAttribute('commission', $productInfo, array());
        $product->commissioning = $this->getAttribute('commissioning', $productInfo, array());
        $product->order_preferences = $this->getAttribute('order_preferences', $productInfo, array());
        $product->price = $this->getAttribute('price', $productInfo, array());

        return $product;
    }

    protected function createSupplier($productInfo)
    {
        $supplierFactory = new SupplierFactory();

        return $supplierFactory->createSupplier( $productInfo['supplier'] );
    }

    protected function createPromotions($productInfo)
    {
        $promotionFactory = new PromotionFactory();

        return $promotionFactory->createPromotions( $productInfo['promotions'] );
    }

}