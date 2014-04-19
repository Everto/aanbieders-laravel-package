<?php namespace Aanbieders\Api;


use Aanbieders\Api\Services\ProductServiceProvider;
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

    protected function registerApiService()
    {
        $this->app['Api'] = $this->app->share(
            function($app)
            {
                return new ApiService( $app['Api.product'] );
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
