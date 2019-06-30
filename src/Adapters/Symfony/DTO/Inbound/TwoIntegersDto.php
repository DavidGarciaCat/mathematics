<?php

namespace App\Adapters\Symfony\DTO\Inbound;

use Symfony\Component\Validator\Constraints as Assert;

class TwoIntegersDto
{
    /**
     * @var int
     *
     * @Assert\NotBlank(message="Number 1 is required")
     * @Assert\Type(type="integer", message="Number 1 must be an integer")
     */
    public $number1;

    /**
     * @var int
     *
     * @Assert\NotBlank(message="Number 2 is required")
     * @Assert\Type(type="integer", message="Number 2 must be an integer")
     */
    public $number2;
}
