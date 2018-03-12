<?php

namespace MotogpBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CustomerAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            //->add('id')
            ->add('name')
            ->add('surname')
            ->add('email')
            ->add('phone')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
           // ->add('id')
            ->add('name')
            ->add('surname')
            ->add('email')
            ->add('phone')
            ->add('type')
            ->add('mediaType')
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
        $formMapper
            ->add('name' ,'text', array('required' => true))
            ->add('surname' ,'text', array('required' => false))
            ->add('phone' ,'text', array('required' => false))
            ->add('email' ,'email', array('required' => true))
            ->add('type', ChoiceType::class, array(
                'choices'  => array(
                    'public' => 'public',
                    'sponsor' => 'sponsor',
                    'media' => 'media'
                ),
            ))
            ->add('mediaType', ChoiceType::class, array(
                    'required' => false,
                    'choices'  => array(
                        'media_pr' =>  'media_pr',
                        'media_radio' => 'media_radio',
                        'media_tv' => 'media_tv',
                        'media_web' => 'media_web',
                        'media_other' => 'media_other'
                    ),
                )
            )
            ->add('userAccepted', 'checkbox', ['label' => 'Confirmado (usuario)' ])
            ->add('adminAccepted', 'checkbox', ['mapped' => 'Confirmado (administración)'])
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('name')
            ->add('surname')
            ->add('email')
            ->add('phone')
        ;
    }
}
