<?php namespace Aanbieders\Api\Services;


class SupplierServiceProvider extends BaseServiceProvider {

    public function __construct()
    {
        //
    }


    public function getSuppliers($category, $segment = 'consumer', $language = 'nl', $supplierIds = array())
    {
        $suppliers = $this->getApiClient()->getSuppliers(
            array(
                'cat'       => $category,
                'sg'        => $segment,
                'lang'      => $language
            ), $supplierIds
        );

        return $suppliers;
    }

    public function getSupplier($category, $segment = 'consumer', $language = 'nl', $supplierId)
    {
        $suppliers = $this->getApiClient()->getSuppliers(
            array(
                'cat'       => $category,
                'sg'        => $segment,
                'lang'      => $language
            ), $supplierId
        );

        return $suppliers[0];
    }

}