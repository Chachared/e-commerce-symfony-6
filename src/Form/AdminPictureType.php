<?php

namespace App\Form;

use App\Entity\Picture;
use Symfony\Component\Form\AbstractType;
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
                'label'=>"Image",
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
                'attr'=>['class'=>'form-control']
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