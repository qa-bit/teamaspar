<?php

namespace MotogpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RegisterType extends AbstractType
{
    
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name' ,'text', array('required' => true))
            ->add('surname' ,'text', array('required' => false))
            ->add('mediaType' ,'text', array('required' => false))
            ->add('phone' ,'text', array('required' => false))
            ->add('accept', 'checkbox', ['mapped' => false])
            ->add('email' ,'email', array('required' => true))
            ->add('locale' ,'text', array('required' => true))
            ->add('type', ChoiceType::class, array(
                'choices'  => array(
                    'public' => 'public',
                    'sponsor' => 'sponsor',
                    'media' => 'media'
                ),
            ))
            ->add('mediaType', ChoiceType::class, array(
                    'choices'  => array(
                        'media_pr' =>  'media_pr',
                        'media_radio' => 'media_radio',
                        'media_tv' => 'media_tv',
                        'media_web' => 'media_web',
                        'media_other' => 'media_other'
                    ),
                )
            );

        ;

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MotogpBundle\Entity\Customer'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'motogpbundle_register';
    }


}
