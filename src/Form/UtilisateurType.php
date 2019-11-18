<?php

namespace App\Form;

use App\Entity\Utilisateur1;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('date_naissance')
            ->add('mail')
            ->add('login')
            ->add('mot_de_passe')
            ->add('date_location')
            ->add('duree')
            ->add('fin_location')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur1::class,
        ]);
    }
}
