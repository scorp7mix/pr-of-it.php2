<?php

namespace App\Exceptions;

class NotFound extends \Exception
{
    public function getErrorMessage()
    {
        return 'Page ' . $this->getMessage() . ' not found';
    }
}
