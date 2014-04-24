<?php namespace Aanbieders\Api\Services;


class SupplierServiceProvider extends BaseServiceProvider {

    public function __construct()
    {
        //
    }


    public function getSuppliers($params, $supplierIds = array())
    {
        $suppliers = $this->getApiClient()->getSuppliers( $params, $supplierIds );

        return $suppliers;
    }

    public function getSupplier($params, $supplierId)
    {
        $suppliers = $this->getApiClient()->getSuppliers( $params, $supplierId );

        return $suppliers[0];
    }

}