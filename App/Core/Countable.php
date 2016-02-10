<?php

namespace App\Core;

trait Countable
{
    protected $data = [];

    /**
     * @return int
     */
    public function count()
    {
        return count($this->data);
    }
}