<?php namespace Aanbieders\Api\Services\Api;


use Aanbieders\Api\Services\BaseServiceProvider;

class OptionServiceProvider extends BaseServiceProvider {

    public function __construct($baseUrl = null)
    {
        parent::__construct($baseUrl);
    }

    
    public function getOptions($params, $optionIds = array())
    {
        $params['option_id'] = $optionIds;
        return $this->getApiClient()->getOptions( $params );
    }

    public function getOption($params, $optionId)
    {
        $params['option_id'] = array($optionId);
        $options = $this->getApiClient()->getOptions( $params );

        return substr($options, 1, -1);
    }

}