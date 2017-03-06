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

class RoomPhotosForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $hotels = $options['hotels'];
        $builder->add('photo', FileType::class, array(
            'attr' => array(
                'multiple' => true,
                'data_class' => null
            )
        ));
        $builder->add('room', ChoiceType::class, array(
            'choices' => $hotels,
            'choice_label' => 'name',
            'label' => 'Hotel',
            'choice_value' => 'id'
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\RoomPhotos',
            'hotels' => null,
        ]);
    }
}