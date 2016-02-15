<?php

namespace App\Exceptions;

class NotFound extends \Exception
{
    public function getErrorMessage()
    {
        return 'Объект с номером #' . $this->getMessage() . ' не найден';
    }
}
