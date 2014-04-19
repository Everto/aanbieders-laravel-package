<?php namespace Aanbieders\Api\Models;


class Product extends BaseModel {

    protected $attributes = array(
        'type'                      => '',
        'id'                        => '',
        'name'                      => '',

        'group_id'                  => '',
        'segment'                   => '',
        'updated'                   => '',

        'supplier'                  => array(),
        'supplier_id'               => '',
        'supplier_name'             => '',

        'status'                    => '',
        'status_code'               => '',

        'monthly_fee'               => array(),
        'contract_periods'          => '',
        'availability'              => array(),

        'specifications'            => array(),
        'texts'                     => array(),
        'links'                     => array(),
        'reviews'                   => array(),

        'options'                   => array(),
        'promotions'                => array(),
        'attachments'               => array(),

        'commission'                => '',
        'commissioning'             => array(),
        'order_preferences'         => array(),
        'price'                     => array()
    );


    public function __construct()
    {

    }

}