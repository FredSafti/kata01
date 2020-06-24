<?php

namespace App;

class Repository
{
    /** @var string */
    protected $path_biens = 'data/biens.csv';

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
                $header = fgetcsv($biens, 0, ';');
                while ($line = fgetcsv($biens, 0, ';'))
                {
                    $result[] = $line;
                }
                return $result;

            case 'SAFTi-ES':
                $result = array();
                while ($line = fgetcsv($biens))
                {
                    $result[] = $line;
                }
                return $result;

            case "megAgence":
                $content = file_get_contents('http://megasoft.dev.safti.local/Git/Frederic/kata01-api/megagence.csv');
                $biens = explode("\n", $content);
                $result = array();
                foreach ($biens as $bien) {
                    $result[] = explode(',', $bien);
                }
                return $result;
        }
    }
}