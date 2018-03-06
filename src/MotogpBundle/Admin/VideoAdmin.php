<?php

namespace MotogpBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use MotogpBundle\Entity\Rider;
use Sonata\AdminBundle\Route\RouteCollection;

class VideoAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('url')
        ;
    }


    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            //->add('id')
            ->add('name')
            ->add('url')
            ->add('categories', null, ['label' => 'Tags'])
            ->add('description')
            //->add('nameEN')
            //->add('description')
            //->add('descriptionEN')
            //->add('seoTitle')
            //->add('seoTitleEN')
            //->add('seoKeywords')
            //->add('seoKeywordsEN')
//            ->add('_order')
//            ->add('updatedAt')
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
            ->add('name')
            ->add('nameEN')
            ->add('url', null, ['attr' => $mediumColumn])
            ->add('urlEN', null, ['attr' => $mediumColumn])
            ->add('description', 'ckeditor')
            ->add('descriptionEN', 'ckeditor')
            ->add('rider', null,
                [
                    'label' => 'Pertenece a',
                    'empty_data'  => null,
                    'placeholder' => " - General",
                    'class' => Rider::class,
                    'query_builder' => function ($qb) {
                        $b = $qb->createQueryBuilder('s')
                            ->innerJoin('s.riderTeam', 'r')
                            ->where('r.main IS NOT NULL');

                        return $b;
                    },
                    'required' => false,
                    'attr' => ['container_classes' => 'col-md-6']
                ], ['admin_code' => 'motogp.admin.rider']
            )
            ->add('season', null,
                [
                    'required' => true,
                    'attr' => ['container_classes' => 'col-md-6']
                ])
            ->add('circuit', null, [
                'label' => 'Circuito',
                'attr' => ['container_classes' => 'col-md-6'],
                'required' => false
            ])
            ->add('categories', 'sonata_type_model', [
                'label' => 'Tags',
                'multiple' => true,
                'attr' => ['container_classes' => 'col-md-6']
            ])
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
            ->end();
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('url')
            ->add('urlEN')
            ->add('type')
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
}
