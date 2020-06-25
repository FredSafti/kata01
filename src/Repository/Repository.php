<?php

namespace App\Repository;

abstract class Repository implements OmageRepositoryInterface
{
    protected $path_biens = 'data/biens.csv';
    protected $headers    = array();

    public function setPath($path)
    {
        $this->path_biens = $path;
    }

    protected function transformLine($arr)
    {
        return array_combine(
            array_slice($this->headers, 0, count($arr)),
            array_slice($arr, 0, count($this->headers))
        );
    }
}