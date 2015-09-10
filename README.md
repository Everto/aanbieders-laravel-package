# Aanbieders.be comparison API

This package offers the Laravel integration of the Aanbieders.be comparison collection API. This API can be used by partners and affiliates of Aanbieders to leverage information from the Aanbieders comparison calculation engine on their personal websites.

In order to use the API (and thus this package), an API key is required. If you are in need of such a key, please get in touch with Aanbieders.be via [their website](https://www.aanbieders.be/contact).



## Installation

Pull this package in through Composer.

```js
{
    "require": {
        " aanbieders/laravel-api": "0.1.*"
    }
}
```


### Native integration

For native PHP projects, all you have to do is create a new instance of the ApiService class that is available within the package. This class requires no parameters and will automatically load all dependencies for you. Once this class is created, you have immediate access to all methods provided by the package.

```php
    require '../vendor/autoload.php';

    $apiService = new \Aanbieders\Api\ApiService();
    $contract = $apiService->getContract(63);
```


### Laravel integration

If you are using Laravel, you can skip the code mentioned above and simply make use of the ApiServiceProvider that is available in the package. This will automatically load all the dependencies for you.

Add the API service provider to your app.php file

```php
        // ...
        'Illuminate\Workbench\WorkbenchServiceProvider',

        'Aanbieders\Api\ApiServiceProvider',
```

Add the API as an alias to your app.php file

```php
        // ...
        'View'            => 'Illuminate\Support\Facades\View',

        'Api'             => 'Aanbieders\Api\Facades\Api',
```

Once this is done, you can access the API using the alias you have selected in you app.php file:

```php
    
    $products = Api::getProducts(
        array(
            'sg'        => 'consumer',
            'cat'       => 'internet',
            'lang'      => 'nl'
        )
    );

    $suppliers = Api::getSuppliers(
        array(
            'sg'        => 'consumer',
            'cat'       => 'internet',
            'lang'      => 'nl'
        )
    );

    $comparisons = Api::getComparisons(
        array(
            'sg'        => 'consumer',
            'cat'       => 'gas',
            'lang'      => 'nl',
            'u'         => '4000',
            'ut'        => 'kwh',
            'zip'       => '3540',
            't'         => 'no',
            'd'         => '0'
        )
    );

    $contract = Api::getContract(63);

```

For information regarding all possible parameters and their properties, we kindly refer you to [the API documentation](http://apihelp.econtract.be/).


