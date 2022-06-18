<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
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
                'attr'=>['class'=>'form-control mt-2']
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'label'=> 'Choix du mot de passe',
                'invalid_message' => 'Veuillez vérifier vos mots de passe.',
                'options' => ['attr' => ['class' => 'password-field form-control mt-2']],
                'required' => true,
                'first_options'  => ['label' => 'Saisir le mot de passe une première fois',
                                    'attr'=>['class'=>'form-control mt-2']
                ],
                'second_options' => ['label' => 'Confirmez votre mot de passe',
                                    'attr'=>['class'=>'form-control mt-2']
                ],
            ])
            ->add('title', TextType::class, [
                'required'=>true,
                'label'=>"Civilité",
                'attr'=>['class'=>'form-control mt-2']
            ])
            ->add('firstname', TextType::class, [
                'required'=>true,
                'label'=>"Prénom",
                'attr'=>['class'=>'form-control mt-2']
            ])
            ->add('lastname', TextType::class, [
                'required'=>true,
                'label'=>"Nom",
                'attr'=>['class'=>'form-control mt-2']
            ])
            ->add('email', EmailType::class, [
                'required'=>true,
                'label'=>"Adresse e-mail",
                'attr'=>['class'=>'form-control mt-2']
            ])
            ->add('birthday', DateType::class, [
                'required'=>true,
                'label'=>"Date de naissance",
                'input_format'=>'dd/mm/YYYY',
                'widget'=>'single_text',
                'attr'=>['class'=>'mt-2']
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
