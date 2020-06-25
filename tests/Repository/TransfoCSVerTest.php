<?php

namespace App\Tests\Repository;

use App\Repository\TransfoCSVer;
use PHPUnit\Framework\TestCase;

class TransfoCSVerTest extends TestCase
{
    public function testTransformLine()
    {
        $transfo = new TransfoCSVer();
        $this->assertSame([], $transfo->transformLine([], []));
    }
}
