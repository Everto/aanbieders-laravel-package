<?php namespace Aanbieders\Api\Services\Crm;


use Aanbieders\Api\Services\BaseServiceProvider;

class OrderServiceProvider extends BaseServiceProvider {

    public function __construct($baseUrl = null)
    {
        parent::__construct($baseUrl);

        $this->defaults = array(
            'client_id'                 => 0,
            'contract_id'               => 0,
            'order_nr'                  => '',
            'remarks'                   => '',
            'comparison_id'             => 0,
            'status'                    => 0,
            'cancellation_reason'       => 0,
            'sales_channel'             => '',
            'campaign_id'               => '',
            'affiliate_id'              => 0,
            'user_id'                   => 0,
            'fulfillment_status'        => 0,
            'billing_status'            => 0,
            'commission'                => 0
        );

        $this->guards = array(
            'status'
        );
    }


    public function getOrder($id)
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/orders/'. $id )
            ->post();
    }

    public function createOrder($attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/orders' )
            ->withData( $this->addDefaultAttributes( $attributes ) )
            ->post();
    }

    public function updateOrder($id, $attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/orders/'. $id )
            ->withData( $this->filterImmutableAttributes( $attributes ) )
            ->post();
    }

}