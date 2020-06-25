<?php


namespace App\Repository;


class TransfoCSVer
{
    public function transformLine($header, $arr)
    {
        return array_combine(
            array_slice($header, 0, count($arr)),
            array_slice($arr, 0, count($header))
        );
    }

}
