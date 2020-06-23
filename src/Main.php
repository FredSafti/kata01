<?php

namespace App;

class Main
{
    private $divergence;

    public function __construct(string $divergence)
    {
        $this->divergence = $divergence;
    }

    public function getDivergence()
    {
        return $this->divergence;
    }
}
