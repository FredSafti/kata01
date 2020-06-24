<?php

namespace App\Tests\Repository;

use App\Enum\Source;
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
            $factory->createRepository(Source::CSV, '')
        );
    }

    public function testAPIRepository()
    {
        $factory = new RepositoryFactory();
        $this->assertInstanceOf(
            APIRepository::class,
            $factory->createRepository(Source::API, '')
        );
    }
}