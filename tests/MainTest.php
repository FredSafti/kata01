<?php

namespace App\Tests;

use App\Enum\Divergence;
use App\Main;
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    public function testDivergence()
    {
        $app = new Main(Divergence::SAFTI);
        $this->assertSame(Divergence::SAFTI, $app->getDivergence());
    }

    public function testListeBien()
    {
        $app = new Main(Divergence::SAFTI);
        $this->assertCount(3, $app->getListeBiens());
    }
}
