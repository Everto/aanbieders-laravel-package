<?php namespace Aanbieders\Api\Models;


class Promotion extends BaseModel {

    protected $attributes = array(
        'id'                        => 0,
        'start_date'                => '',
        'end_date'                  => '',
        'validity_duration'         => 0,

        'isAcquisitionOffer'        => false,
        'isRetentionOffer'          => false,
        'isPermanent'               => false,

        'texts'                     => array(),
        'links'                     => array(),
        'specifications'            => array(),

        'incompatible_with'         => array(),
    );


    public function __construct()
    {
        //
    }

}