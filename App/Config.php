<?php

namespace App;

use App\Core\Singleton;
use App\Core\Std;

class Config
{
    use Singleton;
    use Std;

    private static $data = [];

    private function __construct()
    {
        self::$data = include __DIR__ . '/../config.php';
    }
}