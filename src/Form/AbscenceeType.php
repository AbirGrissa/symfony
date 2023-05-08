<?php

namespace App\Form;

use App\Entity\Abscencee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AbscenceeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('senace')
            ->add('date')
            ->add('module')
            ->add('excuse')
            ->add('etudiantts')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Abscencee::class,
        ]);
    }
}
