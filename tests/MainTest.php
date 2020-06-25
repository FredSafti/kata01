<?php

namespace App\Tests;

use App\Enum\Divergence;
use App\Main;
use App\Repository\Repository;
use App\Repository\SaftiRepository;
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    public function testDivergence()
    {
        $app = new Main(new SaftiRepository());
    }

    public function testListeBien()
    {
        $app = new Main(new SaftiRepository());
        $this->assertCount(3, $app->getListeBiens());
    }


}
