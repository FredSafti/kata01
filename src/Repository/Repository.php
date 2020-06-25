<?php

namespace App\Repository;

use App\Enum\Divergence;

class Repository
{

    private $headers = array();



    abstract public function getDataPath();

    /** @return \Iterable */

    protected function findAll()
    {
        $content = file_get_contents($this->getDataPath());
        $biens = explode("\n", $content);
        $result = array();
        foreach ($biens as $bien) {
            $result[] = $this->transformLine(explode(';', $bien));
        }
        return $result;
    }


    private function transformLine($arr)
    {
        return array_combine(
            array_slice($this->headers, 0, count($arr)),
            array_slice($arr, 0, count($this->headers))
        );
    }
}