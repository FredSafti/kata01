<?php

namespace App\Repository;

class MegagenceRepository extends Repository
{
    private $path;

    public function getDataPath()
    {
        return 'http://megasoft.dev.safti.local/Git/Frederic/kata01-api/megagence.csv';
    }
}