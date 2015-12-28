<?php namespace Aanbieders\Api\Traits\Crm;


use Aanbieders\Api\Services\Crm\RecommendationServiceProvider;

trait RecommendationTrait {

    /**
     * @param int $id
     * @return \stdClass
     */
    public function getRecommendation($id)
    {
        return $this->returnCrmResponse(
            $this->getRecommendationServiceProvider()->getRecommendation($id)
        );
    }


    /**
     * @return RecommendationServiceProvider
     */
    protected function getRecommendationServiceProvider()
    {
        if( is_null($this->recommendationServiceProvider) ) {
            $this->recommendationServiceProvider = new RecommendationServiceProvider();
        }

        return $this->recommendationServiceProvider;
    }

}