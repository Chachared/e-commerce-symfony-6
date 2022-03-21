<?php

namespace App\Form;

use App\Entity\Brand;
use App\Entity\Category;
use App\Entity\Product;
use Doctrine\DBAL\Types\FloatType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdminProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('brand', EntityType::class, [
                'class' => Brand::class,
                'required'=>true,
                'choice_label'=>'name',
                'label'=>'Marque'
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'required'=>true,
                'choice_label'=>'name',
                'label'=>'Catégorie'
            ])
            ->add('title', TextType::class, [
                'required'=>true,
                'label'=>"Titre",
                'attr'=>['class'=>'form-control']
            ])
            ->add('description', TextType::class, [
                'required'=>true,
                'label'=>"Description",
                'attr'=>['class'=>'form-control']
            ])
            ->add('HTprice', NumberType::class, [
                'required'=>true,
                'label'=>"Prix Hors Taxes",
                'attr'=>['class'=>'form-control']
            ])
            ->add('stock', IntegerType::class, [
                'required'=>true,
                'label'=>"Stock",
                'attr'=>['class'=>'form-control']
            ])
            ->add('isActive', CheckboxType::class, [
                'required'=>false,
                'label'=>"Actif",
                'attr'=>['class'=>'checkbox']
            ])
            ->add('isFlash', CheckboxType::class, [
                'required'=>false,
                'label'=>"Produit flash",
                'attr'=>['class'=>'checkbox']
            ])
            ->add('stars', NumberType::class, [
                'required'=>true,
                'label'=>"Nbre d'étoiles",
                'attr'=>['class'=>'form-control']
            ])
            ->add('pictures', CollectionType::class,[
                'label'=>"Ajouter des images",
                'entry_type' => AdminPictureType::class,
                'allow_add' => true,
                'prototype' => true,
            ])
            ->add('save', SubmitType::class, [
                'label'=>"Ajouter",
                'attr'=>['class'=>'btn btn-success rounded-pill my-2']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}