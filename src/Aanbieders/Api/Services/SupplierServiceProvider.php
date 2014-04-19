<?php namespace Aanbieders\Api\Services;


use Aanbieders\Api\Factories\SupplierFactory;

class SupplierServiceProvider extends BaseServiceProvider {

    public function __construct(SupplierFactory $supplierFactory = null)
    {
        if( is_null( $supplierFactory ) ) {
            $supplierFactory = new SupplierFactory();
        }

        $this->supplierFactory = $supplierFactory;
    }


    public function getSuppliers($category, $segment = 'consumer', $language = 'nl', $supplierIds = array())
    {
        $response = $this->getApiClient()->getSuppliers(
            array(
                'cat'       => $category,
                'sg'        => $segment,
                'lang'      => $language
            ), $supplierIds
        );

        $suppliers = $this->supplierFactory->createSuppliers( $response );

        return $suppliers;
    }

    public function getSupplier($category, $segment = 'consumer', $language = 'nl', $supplierId)
    {
        $response = $this->getApiClient()->getSuppliers(
            array(
                'cat'       => $category,
                'sg'        => $segment,
                'lang'      => $language
            ), $supplierId
        );

        $suppliers = $this->supplierFactory->createSuppliers( $response );

        return $suppliers[0];
    }

}