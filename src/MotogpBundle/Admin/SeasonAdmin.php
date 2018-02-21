<?php

namespace MotogpBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class SeasonAdmin extends AbstractAdmin
{
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
            ->add('start', null, ['label' => 'Inicio', 'format' => 'd-m-Y'])
            ->add('end', null, ['label' => 'Fin', 'format' => 'd-m-Y'])
            ->add('circuits')
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
            ->add('name')
            ->add('nameEN')
            ->add('start', 'sonata_type_date_picker', [
                'format'=>'dd/MM/yyyy',
                'label' => 'Inicio', 'attr' => $mediumColumn] )
            ->add('end', 'sonata_type_date_picker', [
                'format'=>'dd/MM/yyyy',
                'label' => 'Fin', 'attr' => $mediumColumn] )
            ->add('circuits', 'sonata_type_model', [
                'multiple' => true,
                'label' => 'Circuitos'
            ],  [
                    'btn_add' => true,
                    'allow_add' => true
                ]
                )
//            ->add('seoTitle')
//            ->add('seoTitleEN')
//            ->add('seoKeywords')
//            ->add('seoKeywordsEN')

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
            ->add('name')
        ;
    }
}
