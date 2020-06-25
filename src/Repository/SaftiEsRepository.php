<?php

namespace App\Repository;

class SaftiEsRepository extends Repository
{
    private $path;


    public function getDataPath()
    {
        return __DIR__.'/data/biens-ES.csv';
    }
}