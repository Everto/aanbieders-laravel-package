<?php namespace Aanbieders\Api;


use Illuminate\Config\Repository as Config;
use Illuminate\Config\FileLoader;
use Illuminate\Filesystem\Filesystem;

use Aanbieders\Api\Services\ProductServiceProvider;
use Aanbieders\Api\Services\SupplierServiceProvider;
use Aanbieders\Api\Services\ComparisonServiceProvider;
use Aanbieders\Api\Services\OptionServiceProvider;
use Aanbieders\Api\Services\PromotionServiceProvider;

use Aanbieders\Api\Services\AddressServiceProvider;
use Aanbieders\Api\Services\ClientServiceProvider;
use Aanbieders\Api\Services\OrderServiceProvider;
use Aanbieders\Api\Services\ContractServiceProvider;

use Aanbieders\Api\Exceptions\AanbiedersApiException;

class ApiService {

    protected $config = null;

    protected $productServiceProvider = null;

    protected $supplierServiceProvider = null;

    protected $comparisonServiceProvider = null;

    protected $optionServiceProvider = null;

    protected $promotionServiceProvider = null;

    protected $addressServiceProvider = null;

    protected $clientServiceProvider = null;

    protected $orderServiceProvider = null;

    protected $contractServiceProvider = null;


    public function __construct(Config $config = null, $productServiceProvider = null, $supplierServiceProvider = null, $comparisonServiceProvider = null, $optionServiceProvider = null, $promotionServiceProvider = null, $addressServiceProvider = null, $clientServiceProvider = null, $orderServiceProvider = null, $contractServiceProvider = null)
    {
        if( is_a($config, '\Illuminate\Config\Repository') ) {
            $this->config = $config;
        } else {
            $config_path = __DIR__. '/../../config';
            $env = 'production';

            $file = new Filesystem();
            $loader = new FileLoader( $file, $config_path );
            $this->config = new Config( $loader, $env );
            $this->config->package( 'aanbieders/api', $config_path, 'Api' );
        }

        $this->productServiceProvider = $productServiceProvider;
        $this->supplierServiceProvider = $supplierServiceProvider;
        $this->comparisonServiceProvider = $comparisonServiceProvider;
        $this->optionServiceProvider = $optionServiceProvider;
        $this->promotionServiceProvider = $promotionServiceProvider;

        $this->addressServiceProvider = $addressServiceProvider;
        $this->clientServiceProvider = $clientServiceProvider;
        $this->orderServiceProvider = $orderServiceProvider;
        $this->contractServiceProvider = $contractServiceProvider;
    }


    public function getProducts($params, $productIds = array())
    {
        return $this->returnIfSuccessful(
            $this->getProductServiceProvider()->getProducts( $params, $productIds )
        );
    }

    public function getProduct($params, $productId)
    {
        return $this->returnIfSuccessful(
            $this->getProductServiceProvider()->getProduct( $params, $productId )
        );
    }


    public function getSuppliers($params, $productIds = array())
    {
        return $this->returnIfSuccessful(
            $this->getSupplierServiceProvider()->getSuppliers( $params, $productIds )
        );
    }

    public function getSupplier($params, $productId)
    {
        return $this->returnIfSuccessful(
            $this->getSupplierServiceProvider()->getSupplier( $params, $productId )
        );
    }


    public function getComparisons($params)
    {
        return $this->returnIfSuccessful(
            $this->getComparisonServiceProvider()->getComparisons($params)
        );
    }


    public function getOptions($params, $optionIds = array())
    {
        return $this->returnIfSuccessful(
            $this->getOptionServiceProvider()->getOptions( $params, $optionIds )
        );
    }

    public function getOption($params, $optionId)
    {
        return $this->returnIfSuccessful(
            $this->getOptionServiceProvider()->getOption( $params, $optionId )
        );
    }


    public function getPromotions($params, $optionIds = array())
    {
        return $this->returnIfSuccessful(
            $this->getPromotionServiceProvider()->getPromotions( $params, $optionIds )
        );
    }

    public function getPromotion($params, $optionId)
    {
        return $this->returnIfSuccessful(
            $this->getPromotionServiceProvider()->getPromotion( $params, $optionId )
        );
    }


    public function getAddress($id)
    {
        return $this->returnCrmResponse(
            $this->getAddressServiceProvider()->getAddress($id)
        );
    }

    public function createAddress($attributes)
    {
        return $this->returnCrmResponse(
            $this->getAddressServiceProvider()->createAddress($attributes)
        );
    }

    public function updateAddress($id, $attributes)
    {
        return $this->returnCrmResponse(
            $this->getAddressServiceProvider()->updateAddress($id, $attributes)
        );
    }


    public function getClient($id)
    {
        return $this->returnCrmResponse(
            $this->getClientServiceProvider()->getClient($id)
        );
    }

    public function searchClient($query)
    {
        return $this->returnCrmResponse(
            $this->getClientServiceProvider()->searchClient($query)
        );
    }

    public function createClient($attributes)
    {
        return $this->returnCrmResponse(
            $this->getClientServiceProvider()->createClient($attributes)
        );
    }

    public function updateClient($id, $attributes)
    {
        return $this->returnCrmResponse(
            $this->getClientServiceProvider()->updateClient($id, $attributes)
        );
    }


    public function getOrder($id)
    {
        return $this->returnCrmResponse(
            $this->getOrderServiceProvider()->getOrder($id)
        );
    }

    public function createOrder($attributes)
    {
        return $this->returnCrmResponse(
            $this->getOrderServiceProvider()->createOrder($attributes)
        );
    }

    public function updateOrder($id, $attributes)
    {
        return $this->returnCrmResponse(
            $this->getOrderServiceProvider()->updateOrder($id, $attributes)
        );
    }


    public function getContract($id)
    {
        return $this->returnCrmResponse(
            $this->getContractServiceProvider()->getContract($id)
        );
    }

    public function createContract($attributes)
    {
        return $this->returnCrmResponse(
            $this->getContractServiceProvider()->createContract($attributes)
        );
    }

    public function updateContract($id, $attributes)
    {
        return $this->returnCrmResponse(
            $this->getContractServiceProvider()->updateContract($id, $attributes)
        );
    }


    protected function returnIfSuccessful($response)
    {
        if( is_array($response) || is_object($response) || $response === '' || is_null($response) ) {
            $response = 'Api error : something went wrong while recovering information via the API. Check your parameters for typos or other mistakes.';
        }

        if( strpos($response, 'Api error') !== false || strpos($response, 'is required') !== false ) {
            throw new AanbiedersApiException($response);
        }

        return $response;
    }

    protected function returnCrmResponse($response)
    {
        return json_decode( $response );
    }


    protected function getProductServiceProvider()
    {
        if( is_null($this->productServiceProvider) ) {
            $this->productServiceProvider = new ProductServiceProvider();
        }

        return $this->productServiceProvider;
    }

    protected function getSupplierServiceProvider()
    {
        if( is_null($this->supplierServiceProvider) ) {
            $this->supplierServiceProvider = new SupplierServiceProvider();
        }

        return $this->supplierServiceProvider;
    }

    protected function getComparisonServiceProvider()
    {
        if( is_null($this->comparisonServiceProvider) ) {
            $this->comparisonServiceProvider = new ComparisonServiceProvider();
        }

        return $this->comparisonServiceProvider;
    }

    protected function getAddressServiceProvider()
    {
        if( is_null($this->addressServiceProvider) ) {
            $this->addressServiceProvider = new AddressServiceProvider( $this->config->get('Api::baseUrl') );
        }

        return $this->addressServiceProvider;
    }

    protected function getClientServiceProvider()
    {
        if( is_null($this->clientServiceProvider) ) {
            $this->clientServiceProvider = new ClientServiceProvider( $this->config->get('Api::baseUrl') );
        }

        return $this->clientServiceProvider;
    }

    protected function getOrderServiceProvider()
    {
        if( is_null($this->orderServiceProvider) ) {
            $this->orderServiceProvider = new OrderServiceProvider( $this->config->get('Api::baseUrl') );
        }

        return $this->orderServiceProvider;
    }

    protected function getContractServiceProvider()
    {
        if( is_null($this->contractServiceProvider) ) {
            $this->contractServiceProvider = new ContractServiceProvider( $this->config->get('Api::baseUrl') );
        }

        return $this->contractServiceProvider;
    }

    protected function getOptionServiceProvider()
    {
        if( is_null($this->optionServiceProvider) ) {
            $this->optionServiceProvider = new OptionServiceProvider( $this->config->get('Api::baseUrl') );
        }

        return $this->optionServiceProvider;
    }

    protected function getPromotionServiceProvider()
    {
        if( is_null($this->promotionServiceProvider) ) {
            $this->promotionServiceProvider = new PromotionServiceProvider( $this->config->get('Api::baseUrl') );
        }

        return $this->promotionServiceProvider;
    }

}