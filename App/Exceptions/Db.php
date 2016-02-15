<?php

namespace App\Exceptions;

class Db extends \Exception
{
    public function getErrorMessage()
    {
        return 'Ошибка базы данных: "' . $this->getMessage() . '"';
    }
}
