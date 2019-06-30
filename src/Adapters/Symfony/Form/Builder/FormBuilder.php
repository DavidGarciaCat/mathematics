<?php

namespace App\Adapters\Symfony\Form\Builder;

use App\Adapters\Symfony\DTO\Inbound\FormModel;
use App\Adapters\Symfony\Form\Type\TwoIntegersType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class FormBuilder
{
    private $formFactory;

    public function __construct(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    public function getForm(FormModel $model): FormInterface
    {
        $builder = $this->formFactory->createNamedBuilder('', TwoIntegersType::class, $model);

        return $builder->getForm();
    }
}
