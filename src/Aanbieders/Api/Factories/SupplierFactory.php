<?php namespace Aanbieders\Api\Factories;


use Aanbieders\Api\Models\Supplier;

class SupplierFactory extends BaseFactory {

    public function createSuppliers(array $suppliersInfo)
    {
        $suppliers = array();
        foreach( $suppliersInfo as $item ) {
            array_push( $suppliers, $this->createSupplier($item) );
        }

        return $suppliers;
    }

    public function createSupplier($supplierInfo)
    {
        $supplier = new Supplier();
        $supplier->id = $this->getAttribute('supplier_id', $supplierInfo, 0);
        $supplier->name = $this->getAttribute('name', $supplierInfo, '');
        $supplier->logo = $this->getAttribute('logo', $supplierInfo, array());

        $supplier->texts = $this->getAttribute('texts', $supplierInfo, array());
        $supplier->links = $this->getAttribute('links', $supplierInfo, array());

        $supplier->address = $this->getAttribute('contact_info', $supplierInfo, array());

        return $supplier;
    }

}