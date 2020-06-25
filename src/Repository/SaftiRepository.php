<?php

namespace App\Repository;

use App\Enum\Divergence;

class SaftiRepository extends Repository
{
    /** @return \Iterable */
    public function findAll()
    {
        $content = file_get_contents('http://omega.dev.safti.local/Git/Frederic/kata01-api/biens.csv');
        $biens = explode("\n", $content);
        $this->headers = explode(';', array_shift($biens));
        $result = array();
        foreach ($biens as $bien) {
            $result[] = $this->transformLine(explode(';', $bien));
        }
        return $result;
    }
}