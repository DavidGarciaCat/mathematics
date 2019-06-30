<?php

namespace App\Tests\Application\Mathematics;

use App\Application\Mathematics\Arithmetical;
use PHPUnit\Framework\TestCase;

class ArithmeticalTest extends TestCase
{
    /** @var Arithmetical */
    private $arithmetical;

    /** {@inheritDoc} */
    protected function setUp()
    {
        $this->arithmetical = new Arithmetical();
    }

    public function testSumTwoIntegers()
    {
        $this->assertEquals(6, $this->arithmetical->add(4, 2));
    }

    public function testSubtractTheSecondInteger()
    {
        $this->assertEquals(2, $this->arithmetical->subtract(4, 2));
    }

    public function testMultiplyTwoIntegers()
    {
        $this->assertEquals(8, $this->arithmetical->multiply(4, 2));
    }

    public function testDivideTheFirstIntegerByTheSecondInteger()
    {
        $this->assertEquals(1, $this->arithmetical->divide(4, 3));
    }
}
