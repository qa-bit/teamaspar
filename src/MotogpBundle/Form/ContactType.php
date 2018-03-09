<?php

namespace MotogpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;

class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name' ,'text', array('required' => true))
            //->add('surname' ,'text', array('required' => false))
            ->add('phone' ,'text', array('required' => true))
            ->add('email' ,'text', array('required' => true))
            //->add('postcode' ,'text', array('required' => true))
            ->add('subject' ,'text', array('required' => true))
            //->add('address' ,'text', array('required' => true))
            ->add('comments' ,'textarea', array('required' => true, 'attr' => ['style' => "height:14.7em"]));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MotogpBundle\Entity\Contact'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'motogpbundle_contact';
    }


}
