<?php

namespace App\Repository;

use App\Enum\Divergence;

class Repository implements RepositoryInterface
{
    protected $path_biens = 'data/biens.csv';
    private   $headers = array();
    private   $divergence;

    /**
     * Repository constructor.
     * @param $divergence
     */
    public function __construct($divergence)
    {
        $this->divergence = $divergence;
    }


    private function setPath($path)
    {
        $this->path_biens = $path;
    }
    
    /** @return \Iterable */
    public function findAll()
    {
        if ($this->divergence == Divergence::SAFTI_ES) {
            $this->setPath('data/biens-ES.csv');
        }
        
        switch($this->divergence)
        {
            case Divergence::SAFTI:
            case Divergence::SAFTI_ES:
                $biens = fopen($this->path_biens, 'r');
                $result = array();
                $this->headers = fgetcsv($biens, 0, ';');
                while ($line = fgetcsv($biens, 0, ';'))
                {
                    $result[] = $this->transformLine($line);
                }
                return $result;

            case Divergence::MEGAGENCE:
                $content = file_get_contents('http://megasoft.dev.safti.local/Git/Frederic/kata01-api/megagence.csv');
                $biens = explode("\n", $content);
                $result = array();
                foreach ($biens as $bien) {
                    $result[] = $this->transformLine(explode(';', $bien));
                }
                return $result;
        }
        return null;
    }

    private function transformLine($arr)
    {
        return array_combine(
            array_slice($this->headers, 0, count($arr)),
            array_slice($arr, 0, count($this->headers))
        );
    }
}