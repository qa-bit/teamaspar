<?php

namespace MotogpBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class RiderTeamExternalAdmin extends AbstractAdmin
{


    protected $baseRoutePattern = 'riderteam-external-admin';
    protected $baseRouteName = 'riderteam-external-admin';
    protected $classNameLabel = "RiderTeam external";

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name')
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
            ->add('name')
            ->add('nameEN')
            ->add('description', 'ckeditor')
            ->add('descriptionEN', 'ckeditor')
            ->add('history', 'ckeditor')
            ->add('historyEN', 'ckeditor')
            ->add('_order')
            ->end()
            ->end()
            ->tab('SEO')
            ->with(null)
            ->add('seoTitle')
            ->add('seoTitleEN')
            ->add('seoKeywords')
            ->add('seoKeywordsEN')
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
            $query->expr()->isNull($query->getRootAliases()[0] . '.main')
        );

        return $query;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
       
        

        if (!$this->isGranted('ROLE_SUPER_ADMIN'))
        {
            $collection
                ->remove('create')
                ->remove('delete')
            ;
        }
    }

}
