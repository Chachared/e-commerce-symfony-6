<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('street_number', TextType::class, [
                'required'=>true,
                'label'=>"N° de rue",
                'attr'=>['class'=>'form-control']
            ])
            ->add('street', TextType::class, [
                'required'=>true,
                'label'=>"Nom de la voie",
                'attr'=>['class'=>'form-control']
            ])
            ->add('zipcode', TextType::class, [
                'required'=>true,
                'label'=>"Code postal",
                'attr'=>['class'=>'form-control']
            ])
            ->add('city', TextType::class, [
                'required'=>true,
                'label'=>"Ville",
                'attr'=>['class'=>'form-control']
            ])
            ->add('country', TextType::class, [
                'required'=>true,
                'label'=>"Pays",
                'attr'=>['class'=>'form-control']
            ])
            ->add('isBilling', CheckboxType::class, [
                'required'=>false,
                'label'=>"Adresse de facturation",
                'attr'=>['class'=>'checkbox']
            ])
            ->add('isDelivery', CheckboxType::class, [
                'required'=>false,
                'label'=>"Adresse de livraison",
                'attr'=>['class'=>'checkbox']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
