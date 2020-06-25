<?php

namespace App\Repository;

use App\Enum\Divergence;

class Repository
{
    protected $path_biens = 'data/biens.csv';
    private $headers = array();

    /** @var string */
    protected $divergence;

    public function __construct($divergence)
    {
        $this->divergence = $divergence;
    }

    /** @return string */
    public function getDivergence()
    {
        return $this->divergence;
    }

    public function setPath($path)
    {
        $this->path_biens = $path;
    }

    /** @return \Iterable */
    public function findAll()
    {
        switch ($this->divergence) {
            case Divergence::SAFTI_ES:
                $this->setPath('data/biens-ES.csv');
                break;
            case Divergence::SAFTI:
                $this->setPath('http://192.168.7.237:8081/Git/Frederic/kata01-api/biens.csv');
                break;
            case Divergence::MEGAGENCE:
                $this->setPath('http://192.168.7.237:8081/Git/Frederic/kata01-api/megagence.csv');
                break;
        }

        if(preg_match('/^https?/', $this->path_biens)) {
            return $this->getContentDist();
        } else {
            return $this->getContentLocal();
        }
    }

    private function getContentDist()
    {
        $content = file_get_contents($this->path_biens);
        $biens = explode("\n", $content);
        $this->headers = explode(';', array_shift($biens));
        $result = array();
        foreach ($biens as $bien) {
            $result[] = $this->transformLine(explode(';', $bien));
        }
        return $result;
    }


    private function getContentLocal()
    {
        $biens = fopen($this->path_biens, 'r');
        $result = array();
        $this->headers = fgetcsv($biens, 0, ';');
        while ($line = fgetcsv($biens, 0, ';')) {
            $result[] = $this->transformLine($line);
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