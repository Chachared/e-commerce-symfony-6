<?php

namespace App\Form;

use App\Entity\Brand;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('searchBar', TextType::class, [
                'label' => 'Barre de recherche',
                'label_attr'=>['class'=>'text-bold my-2'],
                'required'=>false,
                'attr'=>['class'=>'form-control']
            ])
            ->add('category', EntityType::class, [
                'choice_label'=>'name',
                'label' => 'Catégorie',
                'label_attr'=>['class'=>'text-bold my-2'],
                'required'=>false,
                'class'=> Category::class
            ])
            ->add('brand', EntityType::class, [
                'choice_label'=>'name',
                'label' => 'Marque',
                'label_attr'=>['class'=>'text-bold my-2'],
                'required'=>false,
                'class'=> Brand::class
            ])
            ->add('stars', ChoiceType::class, [
                'required'=>false,
                'label' => 'Nombre d\'étoiles',
                'label_attr'=>['class'=>'text-bold my-2'],
                'choices'=> [
                    '1 étoile'=> 1,
                    '2 étoiles'=> 2,
                    '3 étoiles'=> 3,
                    '4 étoiles'=> 4,
                    '5 étoiles'=> 5,
                ],
                'expanded'=>true,
                'multiple'=> true,

            ])
            ->add('minPrice', NumberType::class, [
                'required'=>false,
                'label' => 'Prix minimum',
                'label_attr'=>['class'=>'text-bold my-2'],
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('maxPrice', NumberType::class, [
                'required'=>false,
                'label' => 'Prix maximum',
                'label_attr'=>['class'=>'text-bold my-2'],
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Rechercher',
                'attr'=>[
                    'class'=>'btn btn-success rounded-pill my-2'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}