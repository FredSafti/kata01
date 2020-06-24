<?php

namespace App;

class Configurable extends Repository
{
    /** @var string */
    protected $path_biens = 'data/biens.csv';

    public function setPath(string $path)
    {
        $this->path_biens = $path;
    }
}