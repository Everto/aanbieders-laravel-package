<?php namespace Aanbieders\Api\Traits;


use Aanbieders\Api\Services\AddressServiceProvider;

trait AddressTrait {

    /**
     * @param int $id
     * @return \stdClass
     */
    public function getAddress($id)
    {
        return $this->returnCrmResponse(
            $this->getAddressServiceProvider()->getAddress($id)
        );
    }

    /**
     * @param array $attributes
     * @return \stdClass
     */
    public function createAddress($attributes)
    {
        return $this->returnCrmResponse(
            $this->getAddressServiceProvider()->createAddress($attributes)
        );
    }

    /**
     * @param int $id
     * @param array $attributes
     * @return \stdClass
     */
    public function updateAddress($id, $attributes)
    {
        return $this->returnCrmResponse(
            $this->getAddressServiceProvider()->updateAddress($id, $attributes)
        );
    }


    /**
     * @return AddressServiceProvider
     */
    protected function getAddressServiceProvider()
    {
        if( is_null($this->addressServiceProvider) ) {
            $this->addressServiceProvider = new AddressServiceProvider( $this->config->get('Api::baseUrl') );
        }

        return $this->addressServiceProvider;
    }

}