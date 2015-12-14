<?php namespace Aanbieders\Api\Traits\Crm;


use Aanbieders\Api\Services\Crm\ClientServiceProvider;

trait ClientTrait {

    /**
     * @param int $id
     * @return \stdClass
     */
    public function getClient($id)
    {
        return $this->returnCrmResponse(
            $this->getClientServiceProvider()->getClient($id)
        );
    }

    /**
     * @param string $query
     * @return \stdClass
     */
    public function searchClient($query)
    {
        return $this->returnCrmResponse(
            $this->getClientServiceProvider()->searchClient($query)
        );
    }

    /**
     * @param array $attributes
     * @return \stdClass
     */
    public function createClient($attributes)
    {
        return $this->returnCrmResponse(
            $this->getClientServiceProvider()->createClient($attributes)
        );
    }

    /**
     * @param int $id
     * @param array $attributes
     * @return \stdClass
     */
    public function updateClient($id, $attributes)
    {
        return $this->returnCrmResponse(
            $this->getClientServiceProvider()->updateClient($id, $attributes)
        );
    }


    /**
     * @return ClientServiceProvider
     */
    protected function getClientServiceProvider()
    {
        if( is_null($this->clientServiceProvider) ) {
            $this->clientServiceProvider = new ClientServiceProvider( $this->config->get('Api::baseUrl') );
        }

        return $this->clientServiceProvider;
    }

}