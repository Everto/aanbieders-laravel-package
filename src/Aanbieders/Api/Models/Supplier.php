<?php namespace Aanbieders\Api\Models;


class Supplier extends BaseModel {

    protected $attributes = array(
        'id'                => '',
        'name'              => '',
        'logo'              => array(),

        'texts'             => array(),
        'links'             => array(),

        'address'           => array()
    );


    public function __construct()
    {
        //
    }

}