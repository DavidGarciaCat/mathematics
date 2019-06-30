<?php

namespace App\Adapters\Symfony\Form\Type;

use App\Adapters\Symfony\DTO\Inbound\FormModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TwoIntegersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('number1', IntegerType::class);
        $builder->add('number2', IntegerType::class);
        $builder->add('endpoint', TextType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', FormModel::class);
    }
}
