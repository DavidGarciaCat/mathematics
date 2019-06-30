<?php

namespace App\Tests\Application\Mathematics;

use App\Application\Mathematics\Bitwise;
use PHPUnit\Framework\TestCase;

class BitwiseTest extends TestCase
{
    /** @var Bitwise */
    private $bitwise;

    /** {@inheritDoc} */
    protected function setUp()
    {
        $this->bitwise = new Bitwise();
    }

    public function testPerformsTheLogicalAndOperation()
    {
        $this->assertEquals(0, $this->bitwise->and(0, 5));
        $this->assertEquals(1, $this->bitwise->and(1, 5));
        $this->assertEquals(0, $this->bitwise->and(2, 5));
        $this->assertEquals(4, $this->bitwise->and(4, 5));
        $this->assertEquals(0, $this->bitwise->and(8, 5));
    }

    public function testPerformsTheLogicalInclusiveOrOperation()
    {
        $this->assertEquals(5, $this->bitwise->or(0, 5));
        $this->assertEquals(5, $this->bitwise->or(1, 5));
        $this->assertEquals(7, $this->bitwise->or(2, 5));
        $this->assertEquals(5, $this->bitwise->or(4, 5));
        $this->assertEquals(13, $this->bitwise->or(8, 5));
    }
}
