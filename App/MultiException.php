<?php

namespace App;

use App\Core\ArrayAccess;
use App\Core\Countable;
use App\Core\Iterator;

class MultiException
    extends \Exception
    implements \ArrayAccess, \Iterator, \Countable
{
    use ArrayAccess;
    use Iterator;
    use Countable;
}
