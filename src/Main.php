<?php

namespace App;

use App\Repository\Repository;

class Main extends Repository
{
    /** @return \Iterable */
    public function getListeBiens()
    {
        return $this->findAll();
    }
}
