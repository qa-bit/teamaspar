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

class NewsletterHistoryAdmin extends AbstractAdmin
{

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('newsletter')
            ->add('customer')
            ->add('ip')
            ->add('userAgent')
            ->add('createdAt', null, ['label'=> 'Fecha visualización', 'format' => 'd/m/Y h:j'])
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
        $mediumColumn = ['container_classes' => 'col-md-6'];

        $formMapper
            ->tab('Información')
            ->with(null)
            ->add('newsletter')
            ->add('customer')
            ->add('ip', null, ['attr' => $mediumColumn])
            ->add('createdAt', DatePickerType::class, ['attr' => $mediumColumn])
            ->add('userAgent')
        ;
    }

}
