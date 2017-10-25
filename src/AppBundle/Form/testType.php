<?php

namespace AppBundle\Form;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class testType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('nom')
            ->add('prenom')
            ->add('sexe')
            ->add('contenu')
            ->add('date')
            ->add('envoyer')
        ;
    }

    public function getName()
    {
        return 'appbundle_test';

    }

}