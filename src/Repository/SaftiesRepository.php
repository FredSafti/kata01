<?php

namespace App\Repository;

use App\Enum\Divergence;

class SaftiesRepository extends Repository
{
    /** @return \Iterable */
    public function findAll()
    {
        $this->setPath('data/biens-ES.csv');
        $biens = fopen($this->path_biens, 'r');
        $result = array();
        $this->headers = fgetcsv($biens, 0, ';');
        while ($line = fgetcsv($biens, 0, ';'))
        {
            $result[] = $this->transformLine($line);
        }
        return $result;
    }
}