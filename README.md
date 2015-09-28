Aanbieders.be comparison API
======================================

This package offers the Laravel integration of the Aanbieders.be comparison collection API. This API can be used by partners and affiliates of Aanbieders to leverage information from the Aanbieders comparison calculation engine on their own websites.



## Installation

Pull this package in through Composer.

```js

    {
        "require": {
            " aanbieders/laravel-api": "1.*"
        }
    }

```

Next, you will need to aad several values to your server configuration using the `.env` file:

```

    AANBIEDERS_URL=http://foo.com/bar       // URL to the Aanbieders CRM system
    API_staging=false                       // Is this a staging server?
    API_key=your_public_api_key             // Public API key
    API_secret=your_secret_api_key          // Private API key

```

In order to use the API (and thus this package), an API key is required. If you are in need of such a key, please get in touch with Aanbieders.be via [their website](https://www.aanbieders.be/contact).



## Usage

Add the API service provider to your `config/app.php` file

```php

    'providers'         => array(

        //...
        'Aanbieders\Api\ApiServiceProvider',

    ),

```

Add the API as an alias to your `config/app.php` file

```php

    'facades'           => array(

        //...
        'Api'               => 'Aanbieders\Api\Facades\Api',

    ),

```

Once this is done, you can access the API using the alias you have selected in you `app.php` file:

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




## License

This package is proprietary software and may not be copied or redistributed without explicit permission.




## Contact

Evert Engelen

- Email: evert@aanbieders.be


