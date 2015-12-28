<?php namespace Aanbieders\Api\Services\Crm;


use Aanbieders\Api\Services\BaseServiceProvider;

class RecommendationServiceProvider extends BaseServiceProvider {

    public function __construct($baseUrl = null)
    {
        parent::__construct($baseUrl);
    }


    public function getRecommendation($id, $comparisonId = 0)
    {
        return $this->getCurlService()
            ->to( $this->crmBaseUrl .'/recommendations/'. $id )
            ->withData( array( 'comparison_id' => $comparisonId ) )
            ->get();
    }

}