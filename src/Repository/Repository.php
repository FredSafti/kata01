<?php

namespace App\Repository;

use App\Enum\Divergence;

class Repository
{
    private $headers = array();
    
    /** @return \Iterable */
    public function findAll()
    {
        $dataSource = Divergence::BIEN_SOURCE[$this->divergence];
        return isset($dataSource['csv'])
            ? $this->getResultFromCsv($dataSource['csv'])
            : $this->getResultFromWeb($dataSource['web']);
    }

    private function getResultFromCsv($path)
    {
        $biens = fopen($path, 'r');
        $result = array();
        $this->headers = fgetcsv($biens, 0, ';');
        while ($line = fgetcsv($biens, 0, ';'))
        {
            $result[] = $this->transformLine($line);
        }
        return $result;
    }

    private function getResultFromWeb($url)
    {
        $content = file_get_contents($url);
        $biens = explode("\n", $content);

        $this->headers = explode(';', $biens[0]);
        unset($biens[0]);

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