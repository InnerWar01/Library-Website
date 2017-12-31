<?php

namespace my_project\GestionLivresBundle\Forms;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Test\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SupprimerLivreForm extends AbstractType
{
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('isbn')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'my_project\GestionLivresBundle\Entity\Book'
        ]);
    }
}