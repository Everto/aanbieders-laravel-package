<?php namespace Aanbieders\Api\Services;


use Ixudra\Curl\CurlService;

class ClientServiceProvider extends BaseServiceProvider {

    protected $curlService;


    public function __construct()
    {
        //
    }


    public function getClient($id)
    {
        return $this->getCurlService()->get( $this->getCrmBaseUrl(). '/clients/'. $id );
    }

    public function searchClient($query)
    {
        return $this->getCurlService()->post( $this->getCrmBaseUrl(). '/clients/search', array( 'query' => $query ) );
    }

    public function createClient($attributes = array())
    {
        return $this->getCurlService()->post( $this->getCrmBaseUrl(). '/clients', $this->addDefaultAttributes( $attributes ) );
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
            'gender'            => 0,
            'segment'           => 0,
            'first_name'        => '',
            'last_name'         => '',
            'birthdate'         => date('Y-m-d'),
            'birthplace'        => '',
            'nationality'       => '',
            'idnr'              => '',
            'rrnr'              => '',
            'cellphone'         => '',
            'landline'          => '',
            'email'             => '',
            'language'          => 'nl',
            'company'           => '',
            'vat'               => '',
            'user_id'           => 0,
            'client_id'         => 0,
            'bban'              => '',
            'iban'              => '',
            'bic'               => '',
        );

        return array_merge( $defaults, $attributes );
    }

}