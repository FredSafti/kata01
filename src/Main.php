<?php

namespace App;

use App\Repository\Repository;

class Main
{

    private $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    /** @return \Iterable */
    public function getListeBiens()
    {
        return $this->repository->findAll();
    }
}
