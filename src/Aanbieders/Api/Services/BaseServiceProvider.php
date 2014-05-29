<?php namespace Aanbieders\Api\Services;


use Ixudra\Curl\CurlService;

class BaseServiceProvider {

    protected $apiClient = null;

    protected $curlService = null;

    protected $defaults = array();

    protected $guards = array();


    public function __construct()
    {
        //
    }


    protected function getApiClient()
    {
        if( is_null($this->apiClient) ) {
            $this->apiClient = new \Aanbieders(
                array(
                    'key'           => $_SERVER['API_key'],
                    'secret'        => $_SERVER['API_secret'],
                    'staging'       => $_SERVER['API_staging']
                )
            );
        }

        return $this->apiClient;
    }

    protected function getCurlService()
    {
        if( is_null($this->curlService) ) {
            $this->curlService = new CurlService();
        }

        return $this->curlService;
    }

    protected function getCrmBaseUrl()
    {
        return 'aanbieders.dev/api';
    }

    protected function addDefaultAttributes($attributes)
    {
        return array_merge( $this->defaults, $attributes );
    }

    protected function filterImmutableAttributes($attributes)
    {
        foreach( $this->guards as $guard ) {
            if( array_key_exists( $guard, $attributes ) ) {
                unset( $attributes[ $guard ] );
            }
        }

        return $attributes;
    }

}
