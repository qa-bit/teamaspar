<?php

namespace MotogpBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use MotogpBundle\Entity\Rider;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\CoreBundle\Form\Type\DatePickerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class NewsletterMailingInfoAdmin extends AbstractAdmin
{

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('email')
            ->add('name')
            ->add('surname')
            ->add('active', null, ['editable' => true])
            ->add('customerType')
            ->add('_action', null, array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                ),
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {

        $types = [
            'public' => 'public',
            'sponsor' => 'sponsor',
            'media' => 'media',
            'gpguest' => 'gpguest'
        ];

        $formMapper
            ->tab('Información')
            ->with(null)
            ->add('email')
            ->add('name')
            ->add('surname')
            ->add('customerType', ChoiceType::class, ['choices' => $types, 'required' => true ])
            ->add('active', CheckboxType::class, ['required' => false ])
        ;
    }

}
