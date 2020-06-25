<?php

namespace App\Repository;

use App\Enum\Divergence;

class LocalCSVRepository implements RepositoryInterface
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

        $biens = fopen($this->path_biens, 'r');
        $result = array();
        $this->headers = fgetcsv($biens, 0, ';');
        while ($line = fgetcsv($biens, 0, ';'))
        {
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