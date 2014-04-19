<?php namespace Aanbieders\Api\Models;


class BaseModel {

    /**
     * List of attributes that belong to the model
     *
     * @var array
     */
    protected $attributes = array();

    /**
     * List of attributes that can't be modified unless in specific cases. Use it to make sure that accidental changes
     * don't happen.
     *
     * @var array
     */
    protected $guarded = array();


    public function __get($key)
    {
        if( $this->hasAttribute($key) && !$this->isGuarded($key) ) {
            return $this->attributes[$key];
        }

        return null;
    }

    public function __set($key, $value)
    {
        if( $this->hasAttribute($key) && !$this->isGuarded($key) ) {
            $this->attributes[$key] = $value;
        }
    }

    protected function hasAttribute($key)
    {
        if( array_key_exists( $key, $this->attributes ) ) {
            return true;
        }

        return false;
    }

    protected  function isGuarded($key)
    {
        return in_array($key, $this->guarded);
    }

}