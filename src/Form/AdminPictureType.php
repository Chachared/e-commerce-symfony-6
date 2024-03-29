<?php

namespace App\Form;

use App\Entity\Picture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class AdminPictureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('href', FileType::class, [
                'required'=>true,
                'mapped'=>false,
                'label'=>"Image à télécharger",
                'label_attr'=>['class'=>'text-bold my-2'],
                'constraints'=>[
                    new File(
                        [
                            'maxSize'=>'2M',
                            'maxSizeMessage'=>'Le fichier est trop volumineux',
                            'mimeTypes'=>[
                                'image/jpg',
                                'image/jpeg',
                                'image/png',
                                'image/gif',
                                'image/jfif'
                            ],
                            'mimeTypesMessage'=> 'veuillez télécharger au format jpg, png, jfif, gif ou jpeg'
                            
                        ]
                    )
                ],
                'attr'=>['class'=>'form-control']
            ])
            ->add('alt', TextType::class, [
                'required'=>true,
                'label'=>"texte alternatif",
                'label_attr'=>['class'=>'text-bold my-2'],
                'attr'=>['class'=>'form-control']
            ])
            ->add('isFront', CheckboxType::class, [
                'required'=>false,
                'label'=>"Photo principale, attention n'en choisir qu'une !  ",
                'label_attr'=>['class'=>'text-bold my-2'],
                'attr'=>['class'=>'checkbox ms-2']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Picture::class,
        ]);
    }
}