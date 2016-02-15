<?php

namespace App;

use App\Core\Singleton;

class Logger
{
    use Singleton;

    private $file;

    private function __construct()
    {
        $this->file = fopen(__DIR__ . DS . '..' . DS . 'log' . DS . 'app.error', 'a');
    }

    public function log($message)
    {
        fwrite($this->file, (new \DateTime())->format(\DateTime::W3C) . ' ' . $message . "\n");
    }

    public function logException(\Exception $ex)
    {
        fwrite($this->file,
            (new \DateTime())->format(\DateTime::W3C) . ' ' .
            'Error ' . $ex->getCode() .
            ' in ' . $ex->getFile() .
            ' on line ' . $ex->getLine() .
            ': ' . ($ex->getPrevious() ? $ex->getPrevious()->getMessage() : $ex->getMessage()) . "\n"
        );
    }
}
