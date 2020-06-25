<?php

namespace App\Repository;

class RemoteCSVRepository implements RepositoryInterface
{
    protected $path_biens = 'data/biens.csv';
    private   $headers    = [];
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
        $content = file_get_contents('http://megasoft.dev.safti.local/Git/Frederic/kata01-api/megagence.csv');
        $biens   = explode("\n", $content);
        $result  = [];
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