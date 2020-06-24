<?php

namespace App\Repository;

class APIRepository extends AbstractRepository implements BiensRepository
{
    private const LINE_DELIMITER = "\n";
    private const COLUMN_DELIMITER = ';';

    /** @var string */
    private $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function findAll()
    {
        $biens = explode(
            self::LINE_DELIMITER,
            file_get_contents($this->url)
        );
        $this->headers = explode(self::COLUMN_DELIMITER, array_shift($biens));

        $result = array();
        foreach ($biens as $bien) {
            $result[] = $this->transformLine(explode(self::COLUMN_DELIMITER, $bien));
        }
        return $result;
    }
}