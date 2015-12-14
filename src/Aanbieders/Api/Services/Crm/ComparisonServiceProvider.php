<?php namespace Aanbieders\Api\Services\Crm;


use Aanbieders\Api\Services\BaseServiceProvider;

class ComparisonServiceProvider extends BaseServiceProvider {

    public function __construct($baseUrl = null)
    {
        parent::__construct($baseUrl);
    }


    public function getComparison($id)
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/comparisons/'. $id )
            ->get();
    }

}