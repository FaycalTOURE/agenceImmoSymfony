<?php

namespace App\Form;

use App\Entity\EntityOption;
use App\Entity\Property;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('surface')
            ->add('romms')
            ->add('bedrooms')
            ->add('floor')
            ->add('price')
            ->add('heat', ChoiceType::class, [
                'choices' =>  array_flip(Property::HEAT)
            ])
            ->add('entityOption', EntityType::class, [
                'class' =>  EntityOption::class,
                'choice_label' =>  'name',
                'multiple' =>  true
            ])
            ->add('imageFile', FileType::class, [
                'required' =>  false,
            ])
            ->add('city')
            ->add('address')
            ->add('postal_code')
            ->add('sold');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Property::class,
            'translation_domain' => 'forms'
        ]);
    }
}
