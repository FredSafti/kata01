<?php

namespace App\Tests;

use App\Main;
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    public function testDivergence()
    {
        $app = new Main('SAFTI');
        $this->assertSame('SAFTI', $app->getDivergence());
    }

    public function testListeBien()
    {
        $app = new Main('SAFTI');
        $this->assertCount(3, $app->getListeBiens());
    }
}
