<?php namespace Aanbieders\Api\Facades;


use Illuminate\Support\Facades\Facade;

class Api extends Facade {

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Api';
    }

}