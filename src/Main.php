<?php

namespace App;

class Main
{
    /** @var string */
    private $divergence;

    public function __construct(string $divergence)
    {
        $this->divergence = $divergence;
    }

    /** @return string */
    public function getDivergence()
    {
        return $this->divergence;
    }

    /** @return \Iterable */
    public function getListeBiens()
    {
        $repository = new Repository();
        return $repository->findAll();
    }
}
