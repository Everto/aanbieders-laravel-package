<?php namespace Aanbieders\Api\Factories;


class BaseFactory {

    protected function getAttribute($key, $array, $default)
    {
        if( array_key_exists( $key, $array) ) {
            return $array[ $key ];
        }

        return $default;
    }

}