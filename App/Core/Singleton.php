<?php

namespace App\Core;

/**
 * Implements Singleton pattern
 *
 * Trait Singleton
 * @package App\Core
 */
trait Singleton
{
    private static $instance;

    private function __construct()
    {
    }

    public static function instance()
    {
        if (empty(static::$instance)) {
            static::$instance = new static;
        }
        return static::$instance;
    }
}
