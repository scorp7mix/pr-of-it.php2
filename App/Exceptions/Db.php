<?php

namespace App\Exceptions;

class Db extends \Exception
{
    public function getErrorMessage()
    {
        return $this->getMessage() . ' [Код ошибки: ' . $this->getCode() . ']';
    }
}
