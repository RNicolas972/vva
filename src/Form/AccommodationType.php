<?php

namespace App\Form;

use App\Entity\Accommodation;
use App\Entity\TypeAcco;
use App\Entity\StatusAcco;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AccommodationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('numbPlace')
            ->add('surface')
            ->add('internet')
            ->add('description')
            ->add('priceWeek')
            ->add('statusAcco', EntityType::class, [
                'class' => StatusAcco::class,
                'label' => 'Type de logement', 
                'choice_label' => 'name'])
            ->add('typeAcco', EntityType::class, [
                'class' => TypeAcco::class,
                'label' => 'Type de logement', 
                'choice_label' => 'name'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Accommodation::class,
        ]);
    }
}
