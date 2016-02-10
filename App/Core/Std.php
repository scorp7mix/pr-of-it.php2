<?php

namespace App\Core;

/**
 * Implements some PHP magic methods
 *
 * Trait Std
 * @package App\Core
 */
trait Std
{
    protected $data = [];

    public function __get($name)
    {
        if (is_array($this->data[$name])) {
            return new Arrayable($this->data[$name]);
        }
        return $this->data[$name];
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }
}