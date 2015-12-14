<?php namespace Aanbieders\Api\Traits\Api;


use Aanbieders\Api\Services\Api\SupplierServiceProvider;
use Aanbieders\Api\Exceptions\AanbiedersApiException;

trait SupplierTrait {

    /**
     * @param array $params
     * @param array $supplierIds
     * @return \stdClass
     * @throws AanbiedersApiException
     */
    public function getSuppliers($params, $supplierIds = array())
    {
        return $this->returnIfSuccessful(
            $this->getSupplierServiceProvider()->getSuppliers( $params, $supplierIds )
        );
    }

    /**
     * @param array $params
     * @param int $supplierId
     * @return \stdClass
     * @throws AanbiedersApiException
     */
    public function getSupplier($params, $supplierId)
    {
        return $this->returnIfSuccessful(
            $this->getSupplierServiceProvider()->getSupplier( $params, $supplierId )
        );
    }


    /**
     * @return SupplierServiceProvider
     */
    protected function getSupplierServiceProvider()
    {
        if( is_null($this->supplierServiceProvider) ) {
            $this->supplierServiceProvider = new SupplierServiceProvider();
        }

        return $this->supplierServiceProvider;
    }

}