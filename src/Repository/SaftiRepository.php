<?php

namespace App\Repository;

class SaftiRepository extends Repository
{
    private $path;

    public function getDataPath()
    {
        return __DIR__.'\\..\\..\\data\\biens.csv';
    }
}