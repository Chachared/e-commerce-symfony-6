<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username',TextType::class, [
                'required'=>true,
                'label'=>"Nom d'utilisateur",
                'label_attr'=>['class'=>'text-bold my-2'],
                'attr'=>['class'=>'form-control']
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'label'=> 'Choix du mot de passe',
                'label_attr'=>['class'=>'text-bold my-2'],
                'invalid_message' => 'Veuillez vérifier vos mots de passe.',
                'options' => ['attr' => ['class' => 'password-field form-control']],
                'required' => true,
                'first_options'  => ['label' => 'Saisir le mot de passe une première fois'],
                'second_options' => ['label' => 'Confirmez votre mot de passe'],
            ])
            ->add('title',TextType::class, [
                'required'=>true,
                'label'=>"Titre",
                'label_attr'=>['class'=>'text-bold my-2'],
                'attr'=>['class'=>'form-control']
                ])
            ->add('firstname',TextType::class, [
                'required'=>true,
                'label'=>"Prénom",
                'label_attr'=>['class'=>'text-bold my-2'],
                'attr'=>['class'=>'form-control']
                ])
            ->add('lastname',TextType::class, [
                'required'=>true,
                'label'=>"Nom",
                'label_attr'=>['class'=>'text-bold my-2'],
                'attr'=>['class'=>'form-control']
                ])
            ->add('email',EmailType::class, [
                'required'=>true,
                'label'=>"Adresse mail",
                'label_attr'=>['class'=>'text-bold my-2'],
                'attr'=>['class'=>'form-control']
                ])
            ->add('birthday', DateType::class,[
                'required'=>true,
                'label'=>"Date de naissance",
                'label_attr'=>['class'=>'text-bold my-2'],
                'input_format'=>'dd/mm/YYYY',
                'widget'=>'single_text'
            ])
            ->add('addresses', AddressType::class, [
                'by_reference' => false,
                'mapped' => false,
                'required'=>true,
                'label'=>'Ajouter une adresse',
                'label_attr'=>['class'=>'text-bold my-2']
            ])
            ->add('save', SubmitType::class, [
                'label'=>"M'enregistrer",
                'attr'=>['class'=>'btn auth my-4 mx-4']
            ]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}