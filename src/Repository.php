<?php

namespace App;

class Repository
{
    protected $path_biens = 'data/biens.csv';
    private $headers = ['id', 'titre', 'prix', 'date'];

    public function setPath(string $path)
    {
        $this->path_biens = $path;
    }
    
    /** @return \Iterable */
    public function findAll()
    {
        if ($this->divergence == 'SAFTi-ES') {
            $this->setPath('data/biens-ES.csv');
        }
        
        $biens = fopen($this->path_biens, 'r');
        switch($this->divergence)
        {
            case 'SAFTI':
                $result = array();
                $this->headers = fgetcsv($biens, 0, ';');
                while ($line = fgetcsv($biens, 0, ';'))
                {
                    $result[] = $this->transformLine($line);
                }
                return $result;

            case 'SAFTi-ES':
                $result = array();
                while ($line = fgetcsv($biens, 0, ';'))
                {
                    $result[] = $this->transformLine($line);
                }
                return $result;

            case "megAgence":
                $content = file_get_contents('http://megasoft.dev.safti.local/Git/Frederic/kata01-api/megagence.csv');
                $biens = explode("\n", $content);
                $result = array();
                foreach ($biens as $bien) {
                    $result[] = $this->transformLine(explode(';', $bien));
                }
                return $result;
        }
    }

    private function transformLine(array $arr)
    {
        return array_combine(
            array_slice($this->headers, 0, count($arr)),
            array_slice($arr, 0, count($this->headers))
        );
    }
}