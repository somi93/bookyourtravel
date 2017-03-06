<?php

namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use AppBundle\Entity\City;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class RoomForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $hotels = $options['hotels'];
        $builder->add('name');
        $builder->add('size');
        $builder->add('price');
        $builder->add('description');
        $builder->add('hotel', ChoiceType::class, array(
            'choices' => $hotels,
            'choice_label' => 'name'
        ));
        $builder->add('air_conditioning', CheckboxType::class, array('required' => false));
        $builder->add('coffee_maker', CheckboxType::class, array('required' => false));
        $builder->add('daily_housekeeping', CheckboxType::class, array('required' => false));
        $builder->add('desk', CheckboxType::class, array('required' => false));
        $builder->add('heating', CheckboxType::class, array('required' => false));
        $builder->add('internet', CheckboxType::class, array('required' => false));
        $builder->add('minibar', CheckboxType::class, array('required' => false));
        $builder->add('premium_bedding', CheckboxType::class, array('required' => false));
        $builder->add('rainfall_showerhead', CheckboxType::class, array('required' => false));
        $builder->add('room_service', CheckboxType::class, array('required' => false));
        $builder->add('safe', CheckboxType::class, array('required' => false));
        $builder->add('satelite_channels', CheckboxType::class, array('required' => false));
        $builder->add('shower', CheckboxType::class, array('required' => false));
        $builder->add('slippers', CheckboxType::class, array('required' => false));
        $builder->add('telephone', CheckboxType::class, array('required' => false));
        $builder->add('tv', CheckboxType::class, array('required' => false));
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Room',
            'hotels' => null,
        ]);
    }
}