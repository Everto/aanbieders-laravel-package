<?php namespace Aanbieders\Api\Services\Api;


use Aanbieders\Api\Services\BaseServiceProvider;

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

        return substr($suppliers, 1, -1);
    }

}