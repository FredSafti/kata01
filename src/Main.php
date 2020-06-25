<?php

namespace App;

use App\Repository\Repository;

class Main
{
    /** @var string */
    protected $divergence;
    /**
     * @var Repository
     */
    private $repository;

    public function __construct($divergence)
    {
        $this->divergence = $divergence;
        $this->repository = new Repository($this->divergence);
    }

    /** @return string */
    public function getDivergence()
    {
        return $this->divergence;
    }

    /** @return \Iterable */
    public function getListeBiens()
    {
        return $this->repository->findAll();
    }
}
