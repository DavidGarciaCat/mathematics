<?php

namespace spec\App\Application\Mathematics;

use App\Application\Mathematics\Bitwise;
use PhpSpec\ObjectBehavior;

class BitwiseSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldBeAnInstanceOf(Bitwise::class);
    }

    function it_performs_the_logical_AND_operation()
    {
        $this->and(0, 5)->shouldReturn(0);
        $this->and(1, 5)->shouldReturn(1);
        $this->and(2, 5)->shouldReturn(0);
        $this->and(4, 5)->shouldReturn(4);
        $this->and(8, 5)->shouldReturn(0);
    }

    function it_performs_the_logical_inclusive_OR_operation()
    {
        $this->or(0, 5)->shouldReturn(5);
        $this->or(1, 5)->shouldReturn(5);
        $this->or(2, 5)->shouldReturn(7);
        $this->or(4, 5)->shouldReturn(5);
        $this->or(8, 5)->shouldReturn(13);
    }
}
