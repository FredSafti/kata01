<?php

namespace App\Repository;

interface RepositoryInterface
{
    /** @return Iterable */
    public function findAll();
}