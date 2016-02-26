<?php

namespace App\Exceptions;

class Db extends \Exception
{
    public function getErrorMessage()
    {
        return 'Database error. [Error number: ' . $this->getCode() . ']';
    }
}
