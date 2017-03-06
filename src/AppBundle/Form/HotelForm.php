<?php

namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
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

class HotelForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $cities = $options['cities'];
        $builder->add('name');
        $builder->add('stars', null, array(
            'attr' => array(
                'min' => 1,
                'max' => 5
            )
        ));
        $builder->add('photo');
        $builder->add('coordinates');
        $builder->add('description');
        $builder->add('city', ChoiceType::class, array(
            'choices' => $cities,
            'choice_label' => 'name'
        ));
        $builder->add('bar', CheckboxType::class, array('required' => false));
        $builder->add('concierge_services', CheckboxType::class, array('required' => false));
        $builder->add('conference_space', CheckboxType::class, array('required' => false));
        $builder->add('elevator', CheckboxType::class, array('required' => false));
        $builder->add('fitness_centre', CheckboxType::class, array('required' => false));
        $builder->add('free_parking', CheckboxType::class, array('required' => false));
        $builder->add('garden', CheckboxType::class, array('required' => false));
        $builder->add('hair_salon', CheckboxType::class, array('required' => false));
        $builder->add('indoor_pool', CheckboxType::class, array('required' => false));
        $builder->add('laundry_service', CheckboxType::class, array('required' => false));
        $builder->add('library', CheckboxType::class, array('required' => false));
        $builder->add('luggage_store', CheckboxType::class, array('required' => false));
        $builder->add('massage', CheckboxType::class, array('required' => false));
        $builder->add('restaurant', CheckboxType::class, array('required' => false));
        $builder->add('sauna', CheckboxType::class, array('required' => false));
        $builder->add('shop', CheckboxType::class, array('required' => false));
        $builder->add('smoke_free_property', CheckboxType::class, array('required' => false));
        $builder->add('spa', CheckboxType::class, array('required' => false));
        $builder->add('tennis_court', CheckboxType::class, array('required' => false));
        $builder->add('terrace', CheckboxType::class, array('required' => false));
        $builder->add('wedding_service', CheckboxType::class, array('required' => false));
        $builder->add('wifi', CheckboxType::class, array('required' => false));
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Hotel',
            'cities' => null,
        ]);
    }
}