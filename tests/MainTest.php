<?php

namespace App\Tests;

use App\Enum\Divergence;
use App\Main;
use App\Repository\Repository;
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    public function testDivergence()
    {
        $app = new Main(Divergence::SAFTI,new Repository());
        $this->assertSame(Divergence::SAFTI, $app->getDivergence());
    }

    public function testListeBien()
    {
        $app = new Main(Divergence::SAFTI, new Repository());
        $this->assertCount(3, $app->getListeBiens());
    }


}
