<?php namespace Aanbieders\Api;


use Illuminate\Config\Repository as Config;
use Aanbieders\Api\Traits\SupplierTrait;
use Aanbieders\Api\Traits\ProductTrait;
use Aanbieders\Api\Traits\AffiliateTrait;
use Aanbieders\Api\Traits\ComparisonTrait;
use Aanbieders\Api\Traits\OptionTrait;
use Aanbieders\Api\Traits\PromotionTrait;

use Aanbieders\Api\Traits\AddressTrait;
use Aanbieders\Api\Traits\ClientTrait;
use Aanbieders\Api\Traits\ContractTrait;
use Aanbieders\Api\Traits\OrderTrait;

use Aanbieders\Api\Traits\CallMeBackLeadTrait;
use Aanbieders\Api\Traits\ClickOutLeadTrait;
use Aanbieders\Api\Traits\ReferralLeadTrait;

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
    protected $clickOutLeadServiceProvider = null;
    protected $referralLeadServiceProvider = null;


    public function __construct(Config $config = null, $productServiceProvider = null, $supplierServiceProvider = null, $comparisonServiceProvider = null, $optionServiceProvider = null, $affiliateServiceProvider = null, $promotionServiceProvider = null, $addressServiceProvider = null, $clientServiceProvider = null, $orderServiceProvider = null, $contractServiceProvider = null, $callMeBackLeadServiceProvider = null, $clickOutLeadServiceProvider = null, $referralLeadServiceProvider = null)
    {
        $this->config = $config;

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
        $this->clickOutLeadServiceProvider = $clickOutLeadServiceProvider;
        $this->referralLeadServiceProvider = $referralLeadServiceProvider;
    }


    use ProductTrait, SupplierTrait, ComparisonTrait, AffiliateTrait, OptionTrait, PromotionTrait;
    use AddressTrait, ClientTrait, ContractTrait, OrderTrait, CallMeBackLeadTrait, ReferralLeadTrait, ClickOutLeadTrait;


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

}