<?php

namespace MotogpBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use MotogpBundle\Entity\Rider;

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
            ->add('categories')
            ->add('description')
            //->add('nameEN')
            //->add('description')
            //->add('descriptionEN')
            //->add('seoTitle')
            //->add('seoTitleEN')
            //->add('seoKeywords')
            //->add('seoKeywordsEN')
            ->add('_order')
            ->add('updatedAt')
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
            ->add('type', null, ['attr' => array_merge(['value' => 'youtube'], $mediumColumn)])
            ->add('rider', null,
                [
                    'class' => Rider::class,
                    'query_builder' => function ($qb) {
                        $b = $qb->createQueryBuilder('s')
                            ->innerJoin('s.riderTeam', 'r')
                            ->where('r.main IS NOT NULL');

                        return $b;
                    },
                    'required' => true,
                    'attr' => ['container_classes' => 'col-md-6']
                ], ['admin_code' => 'motogp.admin.rider']
            )
            ->add('description', 'ckeditor')
            ->add('descriptionEN', 'ckeditor')
            ->add('categories', 'sonata_type_model', [
                'label' => 'Tags',
                'multiple' => true
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
