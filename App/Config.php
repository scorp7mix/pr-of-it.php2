<?php

namespace App;

use App\Core\Singleton;
use App\Core\Std;

class Config
{
    use Singleton;
    use Std;

    private function __construct()
    {
        $this->data = include __DIR__ . '/../config.php';
    }
}