<?php namespace Aanbieders\Api;


use Illuminate\Support\ServiceProvider;

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
use Aanbieders\Api\Services\ReferralLeadServiceProvider;

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
        $this->registerComparisonServiceProvider();
        $this->registerOptionServiceProvider();
        $this->registerPromotionServiceProvider();
        $this->registerAffiliateServiceProvider();

        // Register Aanbieders CRM service providers
        $this->registerAddressServiceProvider( $baseUrl );
        $this->registerClientServiceProvider( $baseUrl );
        $this->registerOrderServiceProvider( $baseUrl );
        $this->registerContractServiceProvider( $baseUrl );

        // Register Aanbieders CRM lead service providers
        $this->registerCallMeBackLeadServiceProvider( $baseUrl );
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

    protected function registerComparisonServiceProvider()
    {
        $this->app['Api.comparison'] = $this->app->share(
            function($app)
            {
                return new ComparisonServiceProvider();
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

    protected function registerOrderServiceProvider($baseUrl)
    {
        $this->app['Api.order'] = $this->app->share(
            function($app) use ($baseUrl)
            {
                return new OrderServiceProvider( $baseUrl );
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

    protected function registerCallMeBackLeadServiceProvider($baseUrl)
    {
        $this->app['Api.callMeBackLead'] = $this->app->share(
            function($app) use ($baseUrl)
            {
                return new CallMeBackLeadServiceProvider( $baseUrl );
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
                    $app['Api.order'],
                    $app['Api.contract'],
                    $app['Api.callMeBackLead'],
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
