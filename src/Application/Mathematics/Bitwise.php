<?php

namespace App\Application\Mathematics;

class Bitwise
{
    public function and(int $number1, int $number2): int
    {
        return $number1 & $number2;
    }

    public function or(int $number1, int $number2): int
    {
        return $number1 | $number2;
    }
}
