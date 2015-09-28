<?php namespace Aanbieders\Api\Traits;


use Aanbieders\Api\Services\OptionServiceProvider;
use Aanbieders\Api\Exceptions\AanbiedersApiException;

trait OptionTrait {

    /**
     * @param array $params
     * @param array $optionIds
     * @return \stdClass
     * @throws AanbiedersApiException
     */
    public function getOptions($params, $optionIds = array())
    {
        return $this->returnIfSuccessful(
            $this->getOptionServiceProvider()->getOptions( $params, $optionIds )
        );
    }

    /**
     * @param array $params
     * @param int $optionId
     * @return \stdClass
     * @throws AanbiedersApiException
     */
    public function getOption($params, $optionId)
    {
        return $this->returnIfSuccessful(
            $this->getOptionServiceProvider()->getOption( $params, $optionId )
        );
    }


    /**
     * @return OptionServiceProvider
     */
    protected function getOptionServiceProvider()
    {
        if( is_null($this->optionServiceProvider) ) {
            $this->optionServiceProvider = new OptionServiceProvider( $this->config->get('Api::baseUrl') );
        }

        return $this->optionServiceProvider;
    }

}