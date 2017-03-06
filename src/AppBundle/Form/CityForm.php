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

class CityForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $countries = $options['trait_choices'];
        $builder->add('name');
        $builder->add('photo');
        $builder->add('country', ChoiceType::class, array(
            'choices' => $countries,
            'choice_label' => 'name',
        ));
        $builder->add('title');
        $builder->add('description');
        $builder->add('area');
        $builder->add('population');
        $builder->add('average_temperature');
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\City',
            'trait_choices' => null,
        ]);
    }
}