<?php namespace Aanbieders\Api\Services;


use Ixudra\Curl\CurlService;

class ContractServiceProvider extends BaseServiceProvider {

    protected $curlService;


    public function __construct()
    {
        //
    }


    public function getContract($id)
    {
//        return $this->getCurlService()->get( $this->getCrmBaseUrl(). '/contracts/'. $id );

        $url = $this->getCrmBaseUrl(). '/contracts/'. $id;

//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, $url);
//        $head = curl_exec($ch);
//        curl_close($ch);

        $curlService = new CurlService();
        $response = $curlService->get( $url );

        return $response;
    }

    public function createContract($attributes = array())
    {
        return $this->getCurlService()->post( $this->getCrmBaseUrl(). '/contracts', $this->addDefaultAttributes( $attributes ) );
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

        return array_merge( $defaults, $attributes );
    }

}