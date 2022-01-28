<?php declare(strict_types=1);

namespace App\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class PizzaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category', ChoiceType::class, [
                'required' => false,
                'placeholder' => 'All',
                'choices' => [
                    'Pizza' => 'pizza',
                    'Not Pizza' => 'not-pizza',
                ]
            ]);
    }
}
