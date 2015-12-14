<?php namespace Aanbieders\Api\Services\Crm;


use Aanbieders\Api\Services\BaseServiceProvider;

class ClientServiceProvider extends BaseServiceProvider {

    public function __construct($baseUrl = null)
    {
        parent::__construct($baseUrl);

        $this->defaults = array(
            'gender'            => 0,
            'segment'           => 0,
            'first_name'        => '',
            'last_name'         => '',
            'birthdate'         => date('Y-m-d'),
            'birthplace'        => '',
            'nationality'       => '',
            'idnr'              => '',
            'rrnr'              => '',
            'cellphone'         => '',
            'landline'          => '',
            'email'             => '',
            'language'          => 'nl',
            'company'           => '',
            'vat'               => '',
            'user_id'           => 0,
            'client_id'         => 0,
            'bban'              => '',
            'iban'              => '',
            'bic'               => ''
        );

        $this->guards = array(
            'user_id',
            'client_id'
        );
    }


    public function getClient($id)
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/clients/'. $id )
            ->get();
    }

    public function searchClient($query)
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/clients/search' )
            ->withData( array( 'query' => $query ) )
            ->post();
    }

    public function createClient($attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/clients' )
            ->withData( $this->addDefaultAttributes( $attributes ) )
            ->post();
    }

    public function updateClient($id, $attributes = array())
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/clients/'. $id )
            ->withData( $this->filterImmutableAttributes( $attributes ) )
            ->post();
    }

}