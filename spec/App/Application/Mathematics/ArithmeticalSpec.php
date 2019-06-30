<?php

namespace spec\App\Application\Mathematics;

use App\Application\Mathematics\Arithmetical;
use PhpSpec\ObjectBehavior;

class ArithmeticalSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldBeAnInstanceOf(Arithmetical::class);
    }

    function it_sums_two_integers()
    {
        $this->add(4, 2)->shouldReturn(6);
    }

    function it_subtracts_the_second_integer()
    {
        $this->subtract(4, 2)->shouldReturn(2);
    }

    function it_multiplies_two_integers()
    {
        $this->multiply(4, 2)->shouldReturn(8);
    }

    function it_divides_the_first_integer_by_the_second_integer()
    {
        $this->divide(4, 3)->shouldReturn(1);
    }
}
