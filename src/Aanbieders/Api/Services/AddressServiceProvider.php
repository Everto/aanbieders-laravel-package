<?php namespace Aanbieders\Api\Services;


class AddressServiceProvider extends BaseServiceProvider {

    public function __construct($baseUrl = null)
    {
        parent::__construct($baseUrl);

        $this->defaults = array(
            'street'        => '',
            'nr'            => '',
            'box'           => '',
            'postal_code'   => '',
            'city'          => '',
            'country'       => '',
            'client_id'     => 0,
        );
    }


    public function getAddress($id)
    {
        return $this->getCurlService()->get( $this->crmBaseUrl .'/addresses/'. $id );
    }

    public function createAddress($attributes = array())
    {
        return $this->getCurlService()->post( $this->crmBaseUrl .'/addresses', array(), $this->addDefaultAttributes( $attributes ) );
    }

    public function updateAddress($id, $attributes = array())
    {
        return $this->getCurlService()->post( $this->crmBaseUrl .'/addresses/'. $id, array(), $this->filterImmutableAttributes( $attributes ) );
    }

}