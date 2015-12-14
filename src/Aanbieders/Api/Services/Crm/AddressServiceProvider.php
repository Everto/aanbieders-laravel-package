<?php namespace Aanbieders\Api\Services\Crm;


use Aanbieders\Api\Services\BaseServiceProvider;

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
        return $this->getCurlService()->to( $this->crmBaseUrl .'/addresses/'. $id )->get();
    }

    public function createAddress($attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/addresses' )
            ->withData( $this->addDefaultAttributes( $attributes ) )
            ->post();
    }

    public function updateAddress($id, $attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/addresses/'. $id )
            ->withData( $this->filterImmutableAttributes( $attributes ) )
            ->post();
    }

}