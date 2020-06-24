<?php

namespace App\Tests;

use App\Enum\Divergence;
use App\Enum\Source;
use App\Main;
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    public function testDivergence()
    {
        $app = new Main(Divergence::SAFTI, Source::API, '');
        $this->assertSame(Divergence::SAFTI, $app->getDivergence());
    }

    public function testListeBien()
    {
        $app = new Main(
            Divergence::SAFTI,
            Source::API,
            'http://omega.dev.safti.local/Git/Frederic/kata01-api/biens.csv'
        );
        $this->assertListeConforme($app->getListeBiens());

        $app = new Main(
            Divergence::MEGAGENCE,
            Source::API,
            'http://megasoft.dev.safti.local/Git/Frederic/kata01-api/megagence.csv'
        );
        $this->assertListeConforme($app->getListeBiens());

        $app = new Main(
            Divergence::SAFTI_ES,
            Source::CSV,
            'data/biens-ES.csv'
        );
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
