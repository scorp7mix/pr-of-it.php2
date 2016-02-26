<?php

namespace App\Core;

trait Iterator
{
    protected $data = [];

    /**
     * @var int Iterator pointer
     */
    protected $position = 0;

    /**
     * @return Arrayable|mixed
     */
    public function current()
    {
        if (is_array(current($this->data))) {
            return new Arrayable(current($this->data));
        }
        return current($this->data);
    }

    /**
     * @return mixed
     */
    public function next()
    {
        ++$this->position;
        return next($this->data);
    }

    /**
     * @return mixed
     */
    public function key()
    {
        return key($this->data);
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return $this->position < count($this->data);
    }

    public function rewind()
    {
        $this->position = 0;
    }
}
