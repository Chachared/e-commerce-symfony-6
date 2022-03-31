<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username',TextType::class, [
                'required'=>true,
                'label'=>"Nom d'utilisateur",
                'attr'=>['class'=>'form-control']
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'required'=>true,
                'label'=>"Mot de passe",
                'attr' => ['autocomplete' => 'new-password'],
                'attr'=>['class'=>'form-control'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe devrait faire au moins 6 caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('title',TextType::class, [
                'required'=>true,
                'label'=>"Titre",
                'attr'=>['class'=>'form-control']
                ])
            ->add('firstname',TextType::class, [
                'required'=>true,
                'label'=>"Prénom",
                'attr'=>['class'=>'form-control']
                ])
            ->add('lastname',TextType::class, [
                'required'=>true,
                'label'=>"Nom",
                'attr'=>['class'=>'form-control']
                ])
            ->add('birthday', DateType::class,[
                'required'=>true,
                'label'=>"Date de naissance",
                
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}