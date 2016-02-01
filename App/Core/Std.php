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
    private $data;

    public function __get($name)
    {
        return $this->data[$name] ?: null;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }
}