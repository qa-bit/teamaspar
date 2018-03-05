<?php

namespace MotogpBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class RiderTeamAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {

    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name', null, ['label' => 'Equipo principal'])
            ->add('_action', null, array(
                'actions' => array(
                    'edit' => array()
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
            ->add('name')
            ->add('nameEN')
            ->add('description', 'ckeditor')
            ->add('descriptionEN', 'ckeditor')
            ->add('history', 'ckeditor')
            ->add('historyEN', 'ckeditor')
            ->add('_order')
            ->end()
            ->end()
            ->tab('SEO/SEM')
            ->with(null)
            ->add('seoTitle', null, ['attr' => ['container_classes' => 'col-md-6']])
            ->add('seoTitleEN', null, ['attr' => ['container_classes' => 'col-md-6']])
            ->add('seoKeywords', null, ['attr' => ['container_classes' => 'col-md-6']])
            ->add('seoKeywordsEN', null, ['attr' => ['container_classes' => 'col-md-6']])
            ->add('facebook', null, ['attr' => ['container_classes' => 'col-md-6']])
            ->add('twitter', null, ['attr' => ['container_classes' => 'col-md-6']])
            ->add('instagram', null, ['attr' => ['container_classes' => 'col-md-6']])
            ->add('youtube', null, ['attr' => ['container_classes' => 'col-md-6']])
            ->end()
            ->end()
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
            ->add('nameEN')
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


    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $query->andWhere(
            $query->expr()->isNotNull($query->getRootAliases()[0] . '.main')
        );
        
        return $query;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection
            ->remove('create')
        ;
    }

}
