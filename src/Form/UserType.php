<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'required'=>true,
                'label'=>"Nom d'utilisateur",
                'attr'=>['class'=>'form-control']
            ])
            ->add('title', TextType::class, [
                'required'=>true,
                'label'=>"Civilité",
                'attr'=>['class'=>'form-control']
            ])
            ->add('firstname', TextType::class, [
                'required'=>true,
                'label'=>"Prénom",
                'attr'=>['class'=>'form-control']
            ])
            ->add('lastname', TextType::class, [
                'required'=>true,
                'label'=>"Nom",
                'attr'=>['class'=>'form-control']
            ])
            ->add('email', EmailType::class, [
                'required'=>true,
                'label'=>"Adresse e-mail",
                'attr'=>['class'=>'form-control']
            ])
            ->add('birthday', DateType::class, [
                'required'=>true,
                'label'=>"Date de naissance",
                'input_format'=>'dd/mm/YYYY',
                'widget'=>'single_text'
            ])
            ->add('save', SubmitType::class, options: [
                'label'=>"Ajouter",
                'attr'=>['class'=>'btn btn-add my-2']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
