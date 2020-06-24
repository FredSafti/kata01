<?php

namespace App\Repository;

abstract class AbstractRepository
{
    protected $headers = array();

    protected function transformLine(array $arr)
    {
        return array_combine(
            array_slice($this->headers, 0, count($arr)),
            array_slice($arr, 0, count($this->headers))
        );
    }
}