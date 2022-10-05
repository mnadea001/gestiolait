<?php

namespace App\Form;

use App\Entity\Animal;
use App\Entity\VaccinInjection;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('label')
            ->add('name')
            ->add('height')
            ->add('weight')
            ->add('age')
            ->add('birth_date')
            ->add('race')
            ->add('espece')

            ->add('vaccinInjection', EntityType::class, [
                'label' => false,
                'class' => VaccinInjection::class,
                'multiple' => true,
                'expanded' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Animal::class,
        ]);
    }
}
