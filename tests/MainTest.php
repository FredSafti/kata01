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
        $this->assertListeConforme($app->getListeBiens());

        $app = new Main(Divergence::MEGAGENCE);
        $this->assertListeConforme($app->getListeBiens());

        $app = new Main(Divergence::SAFTI_ES);
        $this->assertListeConforme($app->getListeBiens());
    }

    private function assertListeConforme(array $liste)
    {
        $this->assertGreaterThan(0, count($liste));
        $this->assertConforme($liste[0]);
    }

    private function assertConforme(array $element)
    {
        $this->assertArrayHasKey('id', $element);
        $this->assertArrayHasKey('titre', $element);
        $this->assertArrayHasKey('prix', $element);
        $this->assertArrayHasKey('date', $element);
    }
}
