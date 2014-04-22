# Aanbieders.be comparison API

This package offers the Laravel integration of the Aanbieders.be comparison collection API. This API can be used by partners and affiliates of Aanbieders to leverage information from the Aanbieders comparison calculation engine on their personal websites.

In order to use the API (and thus this package), an API key is required. If you are in need of such a key, please get in touch with Aanbieders.be via [their website](https://www.aanbieders.be/contact).



## Installation

Pull this package in through Composer.

```js
{
    "require": {
        "Everto/aanbieders-laravel-package": "dev-master"
    }
}
```

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

## Usage

Once this is done, you can access the API using the alias you have selected in you app.php file:

```php
$products = Api::getProducts('internet', 'consumer', 'nl');

$suppliers = Api::getSuppliers('internet', 'consumer', 'nl');

$comparisons = Api::getComparisons(
    array(
        'sg'        => 'consumer',
        'lang'      => 'nl',
        'cat'       => 'gas',
        'u'         => '4000',
        'ut'        => 'kwh',
        'zip'       => '3540',
        't'         => 'no',
        'd'         => '0'
    )
);
```

For information regarding all possible parameters and their properties, we kindly refer you to [the API documentation](http://apihelp.econtract.be/).


