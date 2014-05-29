<?php namespace Aanbieders\Api;


use Aanbieders\Api\Services\ProductServiceProvider;
use Aanbieders\Api\Services\SupplierServiceProvider;
use Aanbieders\Api\Services\ComparisonServiceProvider;
use Aanbieders\Api\Services\OrderServiceProvider;
use Aanbieders\Api\Services\ClientServiceProvider;
use Aanbieders\Api\Services\ContractServiceProvider;
use Illuminate\Support\ServiceProvider;

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
        $this->registerProductServiceProvider();
        $this->registerSupplierServiceProvider();
        $this->registerComparisonServiceProvider();
        $this->registerOrderServiceProvider();
        $this->registerClientServiceProvider();
        $this->registerContractServiceProvider();
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

    protected function registerOrderServiceProvider()
    {
        $this->app['Api.order'] = $this->app->share(
            function($app)
            {
                return new OrderServiceProvider();
            }
        );
    }

    protected function registerClientServiceProvider()
    {
        $this->app['Api.client'] = $this->app->share(
            function($app)
            {
                return new ClientServiceProvider();
            }
        );
    }

    protected function registerContractServiceProvider()
    {
        $this->app['Api.contract'] = $this->app->share(
            function($app)
            {
                return new ContractServiceProvider();
            }
        );
    }

    protected function registerApiService()
    {
        $this->app['Api'] = $this->app->share(
            function($app)
            {
                return new ApiService(
                    $app['Api.product'],
                    $app['Api.supplier'],
                    $app['Api.comparison'],
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
