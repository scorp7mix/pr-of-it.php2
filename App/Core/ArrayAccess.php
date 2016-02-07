<?php

namespace App\Core;

trait ArrayAccess
{
    protected $data;

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        if (is_array($this->data[$offset])) {
            $this->data[$offset] = new Arrayable($this->data[$offset]);
            return $this->data[$offset];
        }
        return $this->data[$offset];
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     * @return $this
     */
    public function offsetSet($offset, $value)
    {
        $this->data[$offset] = $value;
        return $this;
    }

    /**
     * @param mixed $offset
     * @return $this
     */
    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
        return $this;
    }
}