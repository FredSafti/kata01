<?php

namespace App;

class Main extends Repository
{
    /** @var string */
    protected $divergence;

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
        return $this->findAll();
    }
}
