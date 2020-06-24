<?php


namespace App\Repository;


class CSVRepository extends AbstractRepository implements BiensRepository
{
    private const COLUMN_DELIMITER = ';';
    private $path_biens;

    public function __construct(string $path)
    {
        $this->path_biens = $path;
    }

    public function findAll()
    {
        $biens = fopen($this->path_biens, 'r');
        $this->headers = fgetcsv($biens, 0, self::COLUMN_DELIMITER);

        $result = array();
        while ($line = fgetcsv($biens, 0, self::COLUMN_DELIMITER))
        {
            $result[] = $this->transformLine($line);
        }

        return $result;
    }
}