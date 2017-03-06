<?php

namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
class HotelTagForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $hotels = $options['hotels'];
        $tags = $options['tags'];
        $builder->add('hotel', ChoiceType::class, array(
            'choices' => $hotels,
            'choice_label' => 'name',
        ));
        $builder->add('tag', ChoiceType::class, array(
            'choices' => $tags,
            'choice_label' => 'tagName',
        ));
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\HotelTags',
            'hotels' => null,
            'tags' => null,
        ]);
    }
}