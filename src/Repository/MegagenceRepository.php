<?php

namespace App\Repository;

class MegagenceRepository extends Repository
{
    /** @return \Iterable */
    public function findAll()
    {
        $content = file_get_contents('http://megasoft.dev.safti.local/Git/Frederic/kata01-api/megagence.csv');
        $biens = explode("\n", $content);
        $this->headers = explode(';', array_shift($biens));
        $result = array();
        foreach ($biens as $bien) {
            $result[] = $this->transformLine(explode(';', $bien));
        }
        return $result;
    }
}