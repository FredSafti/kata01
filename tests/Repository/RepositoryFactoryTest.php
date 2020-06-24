<?php


namespace App\Tests\Repository;


use App\Enum\Divergence;
use App\Repository\APIRepository;
use App\Repository\CSVRepository;
use App\Repository\RepositoryFactory;
use PHPUnit\Framework\TestCase;

class RepositoryFactoryTest extends TestCase
{
    public function testCSVRepository()
    {
        $factory = new RepositoryFactory();
        $this->assertInstanceOf(
            CSVRepository::class,
            $factory->createRepositoryFromDivergence(Divergence::SAFTI_ES)
        );
    }

    public function testAPIRepository()
    {
        $factory = new RepositoryFactory();
        $this->assertInstanceOf(
            APIRepository::class,
            $factory->createRepositoryFromDivergence(Divergence::SAFTI)
        );
        $this->assertInstanceOf(
            APIRepository::class,
            $factory->createRepositoryFromDivergence(Divergence::MEGAGENCE)
        );
    }
}