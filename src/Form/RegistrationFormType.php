<?php

namespace App\Form;

use App\Entity\Address;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
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
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Veuillez vérifier vos mots de passe.',
                'options' => ['attr' => ['class' => 'password-field form-control']],
                'required' => true,
                'first_options'  => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmez votre mot de passe'],
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
            ->add('email',EmailType::class, [
                'required'=>true,
                'label'=>"Adresse mail",
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