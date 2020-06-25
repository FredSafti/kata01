<?php

namespace App;

use App\Repository\Repository;
use App\Factory\RepositoryFactory;

class Main
{
    /**
     * @var string
     */
    protected $divergence;

    /**
     * @var Repository
     */
    private $repository;

    public function __construct($divergence)
    {
        $this->divergence = $divergence;
        $repositoryFactory = new RepositoryFactory();
        $this->repository = $repositoryFactory->getRepo($divergence);
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
