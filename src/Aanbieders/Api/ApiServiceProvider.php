<?php namespace Aanbieders\Api;


use Illuminate\Support\ServiceProvider;

use Aanbieders\Api\Services\ProductServiceProvider;
use Aanbieders\Api\Services\SupplierServiceProvider;
use Aanbieders\Api\Services\ComparisonServiceProvider;
use Aanbieders\Api\Services\OptionServiceProvider;
use Aanbieders\Api\Services\PromotionServiceProvider;

use Aanbieders\Api\Services\AddressServiceProvider;
use Aanbieders\Api\Services\ClientServiceProvider;
use Aanbieders\Api\Services\OrderServiceProvider;
use Aanbieders\Api\Services\ContractServiceProvider;

class ApiServiceProvider extends ServiceProvider {

    /**
     * @var bool
     */
    protected $defer = false;


    /**
     * @return void
     */
    public function boot()
    {
        $this->package('aanbieders/api');
    }

    /**
     * @return void
     */
    public function register()
    {
        $this->app['config']->package('aanbieders/api', __DIR__.'/../../config', 'Api');
        $baseUrl = $this->app['config']->get('Api::baseUrl');

        $this->registerProductServiceProvider();
        $this->registerSupplierServiceProvider();
        $this->registerComparisonServiceProvider();
        $this->registerOptionServiceProvider( $baseUrl );
        $this->registerPromotionServiceProvider( $baseUrl );

        $this->registerAddressServiceProvider( $baseUrl );
        $this->registerClientServiceProvider( $baseUrl );
        $this->registerOrderServiceProvider( $baseUrl );
        $this->registerContractServiceProvider( $baseUrl );

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

    protected function registerOptionServiceProvider($baseUrl)
    {
        $this->app['Api.option'] = $this->app->share(
            function($app) use ($baseUrl)
            {
                return new OptionServiceProvider( $baseUrl );
            }
        );
    }

    protected function registerPromotionServiceProvider($baseUrl)
    {
        $this->app['Api.promotion'] = $this->app->share(
            function($app) use ($baseUrl)
            {
                return new PromotionServiceProvider( $baseUrl );
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
                    $app['Api.promotion'],
                    $app['Api.address'],
                    $app['Api.client'],
                    $app['Api.order'],
                    $app['Api.contract']
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
