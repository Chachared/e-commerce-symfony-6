<?php

namespace App\Form;

use App\Entity\Category;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'required'=>true,
                'label'=>'Catégorie'
            ])

            ->add('parentCategory', EntityType::class, [
                'class' => Category::class,
                'required'=>true,
                'choice_label'=>'name',
                'label'=>'Boutique'
            ])
            ->add('save', SubmitType::class, options: [
                'label'=>"Modifier",
                'attr'=>['class'=>'btn btn-success rounded-pill my-2']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}
