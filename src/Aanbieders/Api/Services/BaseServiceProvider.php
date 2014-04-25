<?php namespace Aanbieders\Api\Services;


class BaseServiceProvider {

    protected  $apiClient = null;


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

            $this->apiClient->setOutputType('object');
        }

        return $this->apiClient;
    }

}
