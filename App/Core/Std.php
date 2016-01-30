<?php

namespace App\Core;

/**
 * Implements some PHP magic methods
 * *self::$data must be declared in target class
 *
 * Trait Std
 * @package App\Core
 */
trait Std
{
    public function __get($name)
    {
        return self::$data[$name] ?: null;
    }

    public function __set($name, $value)
    {
        self::$data[$name] = $value;
    }
}