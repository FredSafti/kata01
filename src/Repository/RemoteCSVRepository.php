<?php

namespace App\Repository;

class RemoteCSVRepository implements RepositoryInterface
{
    private $headers = [];
    private $remoteCSV;

    /**
     * RemoteCSVRepository constructor.
     * @param $remoteCSV
     */
    public function __construct(string $remoteCSV)
    {
        $this->remoteCSV = $remoteCSV;
    }


    /** @return \Iterable */
    public function findAll()
    {
        $content = file_get_contents($this->remoteCSV);
        $biens   = explode("\n", $content);
        $result  = [];
        foreach ($biens as $bien) {
            $result[] = (new TransfoCSVer())->transformLine($this->headers, explode(';', $bien));
        }
        return $result;
    }
}