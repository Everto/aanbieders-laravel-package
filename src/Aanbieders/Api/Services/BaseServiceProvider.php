<?php namespace Aanbieders\Api\Services;


use Ixudra\Curl\CurlService;

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

            $this->apiClient->setOutputType('array');
        }

        return $this->apiClient;
    }

    protected function getProductsViaCurlService($category, $segment = 'consumer', $language = 'nl', $productIds)
    {
        $parameters = array(
            'cat'       => $category,
            'sg'        => $segment,
            'lang'      => $language,
            'key'       => $_SERVER['API_key'],
            'secret'    => $_SERVER['API_secret']
        );

        $url = 'http://api.econtract.be/index?' . http_build_query($parameters, NULL, '&');

        $curlService = new CurlService();
        $response = $curlService->get($url);

        return $response;
    }

}