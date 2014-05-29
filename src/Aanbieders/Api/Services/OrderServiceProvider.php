<?php namespace Aanbieders\Api\Services;


use Ixudra\Curl\CurlService;

class OrderServiceProvider extends BaseServiceProvider {

    protected $curlService;


    public function __construct()
    {
        //
    }


    public function getOrder($id)
    {
        return $this->getCurlService()->get( $this->getCrmBaseUrl() . '/orders/' . $id );
    }

    public function createOrder($attributes = array())
    {
        return $this->getCurlService()->post( $this->getCrmBaseUrl(). '/orders', $this->addDefaultAttributes( $attributes ) );
    }


    protected function getCurlService()
    {
        if( is_null($this->curlService) ) {
            $this->curlService = new CurlService();
        }

        return $this->curlService;
    }

    protected function addDefaultAttributes($attributes)
    {
        $defaults = array(
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

        return array_merge( $defaults, $attributes );
    }

}