<?php

namespace App\Tests\Repository;

use App\Repository\RemoteCSVRepository;
use PHPUnit\Framework\TestCase;

class RemoteCSVRepositoryTest extends TestCase
{
    public function testData()
    {
        $repo = new RemoteCSVRepository(__DIR__ . "/data/biens.csv");
        $this->assertSame([], $repo->findAll());
    }
}
