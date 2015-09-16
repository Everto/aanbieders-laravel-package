<?php namespace Aanbieders\Api;


use Illuminate\Config\Repository as Config;
use Illuminate\Config\FileLoader;
use Illuminate\Filesystem\Filesystem;

use Aanbieders\Api\Services\ProductServiceProvider;
use Aanbieders\Api\Services\SupplierServiceProvider;
use Aanbieders\Api\Services\ComparisonServiceProvider;
use Aanbieders\Api\Services\OptionServiceProvider;
use Aanbieders\Api\Services\PromotionServiceProvider;
use Aanbieders\Api\Services\AffiliateServiceProvider;

use Aanbieders\Api\Services\AddressServiceProvider;
use Aanbieders\Api\Services\ClientServiceProvider;
use Aanbieders\Api\Services\OrderServiceProvider;
use Aanbieders\Api\Services\ContractServiceProvider;
use Aanbieders\Api\Services\CallMeBackLeadServiceProvider;

use Aanbieders\Api\Exceptions\AanbiedersApiException;

class ApiService {

    protected $config = null;

    protected $productServiceProvider = null;
    protected $supplierServiceProvider = null;
    protected $comparisonServiceProvider = null;
    protected $affiliateServiceProvider = null;
    protected $promotionServiceProvider = null;
    protected $optionServiceProvider = null;
    protected $addressServiceProvider = null;

    protected $clientServiceProvider = null;
    protected $orderServiceProvider = null;
    protected $contractServiceProvider = null;

    protected $callMeBackLeadServiceProvider = null;


    public function __construct(Config $config = null, 
                                $productServiceProvider = null, 
                                $supplierServiceProvider = null, 
                                $comparisonServiceProvider = null,
                                $optionServiceProvider = null,  
                                $affiliateServiceProvider = null, 
                                $promotionServiceProvider = null, 
                                $addressServiceProvider = null, 
                                $clientServiceProvider = null, 
                                $orderServiceProvider = null, 
                                $contractServiceProvider = null,
                                $callMeBackLeadServiceProvider = null)
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
        $this->affiliateServiceProvider = $affiliateServiceProvider;
        $this->promotionServiceProvider = $promotionServiceProvider;
        $this->optionServiceProvider = $optionServiceProvider;

        $this->addressServiceProvider = $addressServiceProvider;
        $this->clientServiceProvider = $clientServiceProvider;
        $this->orderServiceProvider = $orderServiceProvider;
        $this->contractServiceProvider = $contractServiceProvider;

        $this->callMeBackLeadServiceProvider = $callMeBackLeadServiceProvider;
    }


    /**
     * @param array $params
     * @param array $productIds
     * @return \stdClass
     * @throws AanbiedersApiException
     */
    public function getProducts($params, $productIds = array())
    {
        return $this->returnIfSuccessful(
            $this->getProductServiceProvider()->getProducts( $params, $productIds )
        );
    }

    /**
     * @param array $params
     * @param int $productId
     * @return \stdClass
     * @throws AanbiedersApiException
     */
    public function getProduct($params, $productId)
    {
        return $this->returnIfSuccessful(
            $this->getProductServiceProvider()->getProduct( $params, $productId )
        );
    }


    /**
     * @param array $params
     * @param array $supplierIds
     * @return \stdClass
     * @throws AanbiedersApiException
     */
    public function getSuppliers($params, $supplierIds = array())
    {
        return $this->returnIfSuccessful(
            $this->getSupplierServiceProvider()->getSuppliers( $params, $supplierIds )
        );
    }

    /**
     * @param array $params
     * @param int $supplierId
     * @return \stdClass
     * @throws AanbiedersApiException
     */
    public function getSupplier($params, $supplierId)
    {
        return $this->returnIfSuccessful(
            $this->getSupplierServiceProvider()->getSupplier( $params, $supplierId )
        );
    }


    /**
     * @param array $params
     * @return \stdClass
     * @throws AanbiedersApiException
     */
    public function getComparisons($params)
    {
        return $this->returnIfSuccessful(
            $this->getComparisonServiceProvider()->getComparisons($params)
        );
    }

    /**
     * @param array $params
     * @param int $comparisonId
     * @return \stdClass
     * @throws AanbiedersApiException
     */
    public function readComparison($params, $comparisonId)
    {
        return $this->returnIfSuccessful(
            $this->getComparisonServiceProvider()->readComparison($params, $comparisonId)
        );
    }


    /**
     * @param array $params
     * @param array $affiliateIds
     * @return \stdClass
     * @throws AanbiedersApiException
     */
    public function getAffiliates($params, $affiliateIds = array())
    {
        return $this->returnIfSuccessful(
            $this->getAffiliateServiceProvider()->getAffiliates( $params, $affiliateIds )
        );
    }

    /**
     * @param array $params
     * @param int $affiliateId
     * @return \stdClass
     * @throws AanbiedersApiException
     */
    public function getAffiliate($params, $affiliateId)
    {
        return $this->returnIfSuccessful(
            $this->getAffiliateServiceProvider()->getAffiliate( $params, $affiliateId )
        );
    }


    public function getOptions($params, $affiliateIds = array())
    {
        return $this->returnIfSuccessful(
            $this->getOptionServiceProvider()->getOptions( $params, $affiliateIds )
        );
    }

    public function getOption($params, $affiliateId)
    {
        return $this->returnIfSuccessful(
            $this->getOptionServiceProvider()->getOption( $params, $affiliateId )
        );
    }

    public function getPromotions($params, $affiliateIds = array())
    {
        return $this->returnIfSuccessful(
            $this->getPromotionServiceProvider()->getPromotions( $params, $affiliateIds )
        );
    }

    public function getPromotion($params, $affiliateId)
    {
        return $this->returnIfSuccessful(
            $this->getPromotionServiceProvider()->getPromotion( $params, $affiliateId )
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


    /**
     * @param array $attributes
     * @return \stdClass
     * @throws AanbiedersApiException
     */
    public function createCallMeBackLead($attributes)
    {
        return $this->returnCrmResponse(
            $this->getCallMeBackLeadServiceProvider()->createCallMeBackLead($attributes)
        );
    }

    /**
     * @param $response
     * @return \stdClass
     * @throws AanbiedersApiException
     */
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

    /**
     * @param string $response
     * @return \stdClass
     */
    protected function returnCrmResponse($response)
    {
        return json_decode( $response );
    }

    /**
     * @return ProductServiceProvider
     */
    protected function getProductServiceProvider()
    {
        if( is_null($this->productServiceProvider) ) {
            $this->productServiceProvider = new ProductServiceProvider();
        }

        return $this->productServiceProvider;
    }

    /**
     * @return SupplierServiceProvider
     */
    protected function getSupplierServiceProvider()
    {
        if( is_null($this->supplierServiceProvider) ) {
            $this->supplierServiceProvider = new SupplierServiceProvider();
        }

        return $this->supplierServiceProvider;
    }

    /**
     * @return ComparisonServiceProvider
     */
    protected function getComparisonServiceProvider()
    {
        if( is_null($this->comparisonServiceProvider) ) {
            $this->comparisonServiceProvider = new ComparisonServiceProvider();
        }

        return $this->comparisonServiceProvider;
    }

    /**
     * @return AffiliateServiceProvider
     */
    protected function getAffiliateServiceProvider()
    {
        if( is_null($this->affiliateServiceProvider) ) {
            $this->affiliateServiceProvider = new AffiliateServiceProvider( $this->config->get('Api::baseUrl') );
        }

        return $this->affiliateServiceProvider;
    }

    /**
     * @return PromotionServiceProvider
     */
    protected function getPromotionServiceProvider()
    {
        if( is_null($this->promotionServiceProvider) ) {
            $this->promotionServiceProvider = new PromotionServiceProvider( $this->config->get('Api::baseUrl') );
        }

        return $this->promotionServiceProvider;
    }

    /**
     * @return OptionServiceProvider
     */
    protected function getOptionServiceProvider()
    {
        if( is_null($this->optionServiceProvider) ) {
            $this->optionServiceProvider = new OptionServiceProvider( $this->config->get('Api::baseUrl') );
        }

        return $this->optionServiceProvider;
    }

    /**
     * @return AddressServiceProvider
     */
    protected function getAddressServiceProvider()
    {
        if( is_null($this->addressServiceProvider) ) {
            $this->addressServiceProvider = new AddressServiceProvider( $this->config->get('Api::baseUrl') );
        }

        return $this->addressServiceProvider;
    }

    /**
     * @return ClientServiceProvider
     */
    protected function getClientServiceProvider()
    {
        if( is_null($this->clientServiceProvider) ) {
            $this->clientServiceProvider = new ClientServiceProvider( $this->config->get('Api::baseUrl') );
        }

        return $this->clientServiceProvider;
    }

    /**
     * @return OrderServiceProvider
     */
    protected function getOrderServiceProvider()
    {
        if( is_null($this->orderServiceProvider) ) {
            $this->orderServiceProvider = new OrderServiceProvider( $this->config->get('Api::baseUrl') );
        }

        return $this->orderServiceProvider;
    }

    /**
     * @return ContractServiceProvider
     */
    protected function getContractServiceProvider()
    {
        if( is_null($this->contractServiceProvider) ) {
            $this->contractServiceProvider = new ContractServiceProvider( $this->config->get('Api::baseUrl') );
        }

        return $this->contractServiceProvider;
    }

    /**
     * @return CallMeBackLeadServiceProvider
     */
    protected function getCallMeBackLeadServiceProvider()
    {
        if( is_null($this->callMeBackLeadServiceProvider) ) {
            $this->callMeBackLeadServiceProvider = new CallMeBackLeadServiceProvider( $this->config->get('Api::baseUrl') );
        }

        return $this->callMeBackLeadServiceProvider;
    }

}