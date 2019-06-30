<?php

namespace App\Adapters\Symfony\DTO\Inbound;

use Symfony\Component\Validator\Constraints as Assert;

class FormModel extends TwoIntegersDto
{
    /**
     * @var string
     *
     * @Assert\NotBlank()
     */
    public $endpoint;
}
