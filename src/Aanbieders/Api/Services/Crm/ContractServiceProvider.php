<?php namespace Aanbieders\Api\Services\Crm;


use Aanbieders\Api\Services\BaseServiceProvider;

class ContractServiceProvider extends BaseServiceProvider {

    public function __construct($baseUrl = null)
    {
        parent::__construct($baseUrl);

        $this->defaults = array(
            'product_id'            => 0,
            'producttype_id'        => 0,
            'supplier_id'           => 0,
            'address_id'            => 0,
            'invoice_address_id'    => 0,
            'customer_refnr'        => '',
            'order_refnr'           => '',
            'contract_refnr'        => '',
            'start_date'            => date('Y-m-d'),
            'end_date'              => date('Y-m-d', strtotime('+ 1 year')),
            'duration'              => 0,
            'payment_method'        => '',
            'monthly_fee'           => 0,
            'monthly_fee_promo'     => 0,
            'status'                => 0
        );

        $this->guards = array(
            'status'
        );
    }


    public function getContract($id)
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/contracts/'. $id )
            ->get();
    }

    public function createContract($attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/contracts' )
            ->withData( $this->addDefaultAttributes( $attributes ) )
            ->post();
    }

    public function updateContract($id, $attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/contracts/'. $id )
            ->withData( $this->filterImmutableAttributes( $attributes ) )
            ->post();
    }

}