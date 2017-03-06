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

class ReviewForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $hotels = $options['trait_choices'];
        $builder->add('positive');
        $builder->add('negative');
        $builder->add('hotel', ChoiceType::class, array(
            'choices' => $hotels,
            'choice_label' => 'name',
        ));
        $builder->add('clean', null, array(
            'attr' => array(
                'min' => 1,
                'max' => 10
            )
        ));
        $builder->add('comfort', null, array(
            'attr' => array(
                'min' => 1,
                'max' => 10
            )
        ));
        $builder->add('location', null, array(
            'attr' => array(
                'min' => 1,
                'max' => 10
            )
        ));
        $builder->add('staff', null, array(
            'attr' => array(
                'min' => 1,
                'max' => 10
            )
        ));
        $builder->add('services', null, array(
            'attr' => array(
                'min' => 1,
                'max' => 10
            )
        ));
        $builder->add('value_for_money', null, array(
            'attr' => array(
                'min' => 1,
                'max' => 10
            )
        ));
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Review',
            'trait_choices' => null,
        ]);
    }
}