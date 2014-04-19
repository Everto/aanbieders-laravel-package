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
        $this->app['aanbieders.api.product'] = $this->app->share(function($app)
        {
            return new ProductServiceProvider();
        });
    }

    protected function registerApiService()
    {
        $this->app['AanbiedersAPI'] = $this->app->share(function($app)
        {
            return new ApiService( $app['aanbieders.api.product'] );
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return array('AanbiedersAPI');
    }

}
