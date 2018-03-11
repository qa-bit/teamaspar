<?php

namespace MotogpBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class MotoAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('name')
            ->add('nameEN')
            ->add('builder')
            ->add('description')
            ->add('descriptionEN')
            ->add('seoTitle')
            ->add('seoTitleEN')
            ->add('seoKeywords')
            ->add('seoKeywordsEN')
            ->add('_order')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name')
            ->add('builder')
            ->add('_order')
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
            ->tab('Información')
                ->with(null)
                ->add('builder', null, ['required' => true])
                ->add('name')
                ->add('nameEN')
                ->add('description', 'ckeditor')
                ->add('descriptionEN', 'ckeditor')
                ->add('_order')
            ->end()
            ->end()
            ->tab('Seo')
            ->with(null)
                ->add('seoTitle')
                ->add('seoTitleEN')
                ->add('seoKeywords')
                ->add('seoKeywordsEN')
            ->end()
            ->end()
//            ->add('createdAt')
//            ->add('updatedAt')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
//            ->add('id')
//            ->add('name')
//            ->add('nameEN')
//            ->add('description')
//            ->add('descriptionEN')
//            ->add('seoTitle')
//            ->add('seoTitleEN')
//            ->add('seoKeywords')
//            ->add('seoKeywordsEN')
//            ->add('_order')
//            ->add('createdAt')
//            ->add('updatedAt')
        ;
    }


    protected function configureRoutes(RouteCollection $collection)
    {

        //if (!$isSuperAdmin) {
        $collection
            ->remove('delete');
        //}
    }
}
