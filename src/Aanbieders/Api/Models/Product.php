<?php namespace Aanbieders\Api\Models;


class Product extends BaseModel {

    protected $attributes = array(
        'id'                => '',
        'review'            => '',
        'timestamp'         => '',
        'ip'                => '',
        'customerId'        => '',
        'websiteId'         => '',
        'productId'         => '',
        'language'          => '',
        'isPusblished'      => '',
        'score'             => '',
        'txtName'           => '',
        'txtEmail'          => '',
        'isDeleted'         => ''
    );


    public function __construct()
    {

    }

}