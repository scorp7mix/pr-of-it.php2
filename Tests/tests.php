<?php

error_reporting(E_ALL);

require __DIR__ . '/../autoload.php';

/**
 * Required params in php.ini:
 * zend.assertions = 1
 * assert.exception = On
 *
 * @param $value
 * @param $msg
 * @return string
 */
function check($value, $msg)
{
    try {
        assert($value);
    } catch (AssertionError $e) {
        return $msg . " test failed\n";
    }

    return $msg . " test success\n";
}
