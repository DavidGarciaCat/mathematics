<?php

namespace App\Application\Mathematics;

class Arithmetical
{
    public function add(int $number1, int $number2): int
    {
        return $number1 + $number2;
    }

    public function subtract(int $number1, int $number2): int
    {
        return $number1 - $number2;
    }

    public function multiply(int $number1, int $number2): int
    {
        return $number1 * $number2;
    }

    public function divide(int $number1, int $number2): int
    {
        return $number1 / $number2;
    }
}
