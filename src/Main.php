<?php

namespace App;

use App\Repository\Repository;

class Main extends Repository
{
    /** @var string */
    protected $divergence;

    private $repository;

    public function __construct($divergence,$repository)
    {
        $this->divergence = $divergence;
        $this->repository = $repository;
    }

    /** @return string */
    public function getDivergence()
    {
        return $this->divergence;
    }

    /** @return \Iterable */
    public function getListeBiens()
    {
        return $this->findAll();
    }
}
