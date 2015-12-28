<?php namespace Aanbieders\Api;


use Illuminate\Support\ServiceProvider;

use Aanbieders\Api\Services\Api\ProductServiceProvider;
use Aanbieders\Api\Services\Api\SupplierServiceProvider;
use Aanbieders\Api\Services\Api\ComparisonServiceProvider as ApiComparisonServiceProvider;
use Aanbieders\Api\Services\Api\OptionServiceProvider;
use Aanbieders\Api\Services\Api\PromotionServiceProvider;
use Aanbieders\Api\Services\Api\AffiliateServiceProvider;

use Aanbieders\Api\Services\Crm\AddressServiceProvider;
use Aanbieders\Api\Services\Crm\ClientServiceProvider;
use Aanbieders\Api\Services\Crm\OrderServiceProvider;
use Aanbieders\Api\Services\Crm\RecommendationServiceProvider as CrmComparisonServiceProvider;
use Aanbieders\Api\Services\Crm\ContractServiceProvider;

use Aanbieders\Api\Services\Crm\CallMeBackLeadServiceProvider;
use Aanbieders\Api\Services\Crm\ClickOutLeadServiceProvider;
use Aanbieders\Api\Services\Crm\ReferralLeadServiceProvider;

class ApiServiceProvider extends ServiceProvider {

    /**
     * @var bool
     */
    protected $defer = false;


    /**
     * @return void
     */
    public function register()
    {
        $baseUrl = $_SERVER[ 'AANBIEDERS_URL' ];

        // Register Aanbieders engine service providers
        $this->registerProductServiceProvider();
        $this->registerSupplierServiceProvider();
        $this->registerApiComparisonServiceProvider();
        $this->registerOptionServiceProvider();
        $this->registerPromotionServiceProvider();
        $this->registerAffiliateServiceProvider();

        // Register Aanbieders CRM service providers
        $this->registerAddressServiceProvider( $baseUrl );
        $this->registerClientServiceProvider( $baseUrl );
        $this->registerOrderServiceProvider( $baseUrl );
        $this->registerCrmComparisonServiceProvider( $baseUrl );
        $this->registerContractServiceProvider( $baseUrl );

        // Register Aanbieders CRM lead service providers
        $this->registerCallMeBackLeadServiceProvider( $baseUrl );
        $this->registerClickOutLeadServiceProvider( $baseUrl );
        $this->registerReferralLeadServiceProvider( $baseUrl );

        $this->registerApiService();
    }

    protected function registerProductServiceProvider()
    {
        $this->app['Api.product'] = $this->app->share(
            function($app)
            {
                return new ProductServiceProvider();
            }
        );
    }

    protected function registerSupplierServiceProvider()
    {
        $this->app['Api.supplier'] = $this->app->share(
            function($app)
            {
                return new SupplierServiceProvider();
            }
        );
    }

    protected function registerApiComparisonServiceProvider()
    {
        $this->app['Api.comparison'] = $this->app->share(
            function($app)
            {
                return new ApiComparisonServiceProvider();
            }
        );
    }

    protected function registerAffiliateServiceProvider()
    {
        $this->app['Api.affiliate'] = $this->app->share(
            function($app)
            {
                return new AffiliateServiceProvider();
            }
        );
    }

    protected function registerOptionServiceProvider()
    {
        $this->app['Api.option'] = $this->app->share(
            function($app)
            {
                return new OptionServiceProvider();
            }
        );
    }

    protected function registerPromotionServiceProvider()
    {
        $this->app['Api.promotion'] = $this->app->share(
            function($app)
            {
                return new PromotionServiceProvider();
            }
        );
    }

    protected function registerAddressServiceProvider($baseUrl)
    {
        $this->app['Api.address'] = $this->app->share(
            function($app) use ($baseUrl)
            {
                return new AddressServiceProvider( $baseUrl );
            }
        );
    }

    protected function registerClientServiceProvider($baseUrl)
    {
        $this->app['Api.client'] = $this->app->share(
            function($app) use ($baseUrl)
            {
                return new ClientServiceProvider( $baseUrl );
            }
        );
    }

    protected function registerCrmComparisonServiceProvider($baseUrl)
    {
        $this->app['Api.crm.comparison'] = $this->app->share(
            function($app) use ($baseUrl)
            {
                return new CrmComparisonServiceProvider( $baseUrl );
            }
        );
    }

    protected function registerContractServiceProvider($baseUrl)
    {
        $this->app['Api.contract'] = $this->app->share(
            function($app) use ($baseUrl)
            {
                return new ContractServiceProvider( $baseUrl );
            }
        );
    }

    protected function registerOrderServiceProvider($baseUrl)
    {
        $this->app['Api.order'] = $this->app->share(
            function($app) use ($baseUrl)
            {
                return new OrderServiceProvider( $baseUrl );
            }
        );
    }

    protected function registerCallMeBackLeadServiceProvider($baseUrl)
    {
        $this->app['Api.callMeBackLead'] = $this->app->share(
            function($app) use ($baseUrl)
            {
                return new CallMeBackLeadServiceProvider( $baseUrl );
            }
        );
    }

    protected function registerClickOutLeadServiceProvider($baseUrl)
    {
        $this->app['Api.clickOutLead'] = $this->app->share(
            function($app) use ($baseUrl)
            {
                return new ClickOutLeadServiceProvider( $baseUrl );
            }
        );
    }

    protected function registerReferralLeadServiceProvider($baseUrl)
    {
        $this->app['Api.referralLead'] = $this->app->share(
            function($app) use ($baseUrl)
            {
                return new ReferralLeadServiceProvider( $baseUrl );
            }
        );
    }

    protected function registerApiService()
    {
        $this->app['Api'] = $this->app->share(
            function($app)
            {
                return new ApiService(
                    $app['config'],
                    $app['Api.product'],
                    $app['Api.supplier'],
                    $app['Api.comparison'],
                    $app['Api.option'],
                    $app['Api.affiliate'],
                    $app['Api.promotion'],
                    $app['Api.address'],
                    $app['Api.client'],
                    $app['Api.crm.comparison'],
                    $app['Api.contract'],
                    $app['Api.order'],
                    $app['Api.callMeBackLead'],
                    $app['Api.clickOutLead'],
                    $app['Api.referralLead']
                );
            }
        );
    }

    /**
     * @return array
     */
    public function provides()
    {
        return array('Api');
    }

}
