<?php

namespace App;

use App\Core\ArrayAccess;
use App\Core\Singleton;
use App\Core\Std;

class Config implements \ArrayAccess
{
    use Singleton;
    use Std;
    use ArrayAccess;

    private function __construct()
    {
        $this->data = include __DIR__ . '/../config.php';
    }
}
