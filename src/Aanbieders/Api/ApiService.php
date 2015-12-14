<?php namespace Aanbieders\Api;


use Illuminate\Config\Repository as Config;
use Aanbieders\Api\Traits\Api\SupplierTrait;
use Aanbieders\Api\Traits\Api\ProductTrait;
use Aanbieders\Api\Traits\Api\AffiliateTrait;
use Aanbieders\Api\Traits\Api\ComparisonTrait;
use Aanbieders\Api\Traits\Api\OptionTrait;
use Aanbieders\Api\Traits\Api\PromotionTrait;

use Aanbieders\Api\Traits\Crm\AddressTrait;
use Aanbieders\Api\Traits\Crm\ClientTrait;
use Aanbieders\Api\Traits\Crm\ContractTrait;
use Aanbieders\Api\Traits\Crm\OrderTrait;

use Aanbieders\Api\Traits\Crm\CallMeBackLeadTrait;
use Aanbieders\Api\Traits\Crm\ClickOutLeadTrait;
use Aanbieders\Api\Traits\Crm\ReferralLeadTrait;

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
    use AddressTrait, ClientTrait, ContractTrait, OrderTrait;
    use CallMeBackLeadTrait, ClickOutLeadTrait, ReferralLeadTrait;


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