<?php

namespace App;

use App\Repository\BiensRepository;
use App\Repository\RepositoryFactory;

class Main
{
    /** @var string */
    private $divergence;

    /** @var BiensRepository */
    private $repository;

    public function __construct(string $divergence, string $source, string $path)
    {
        $this->divergence = $divergence;

        $factory = new RepositoryFactory();
        $this->repository = $factory->createRepository($source, $path);
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
