<?php

namespace MotogpBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class GeneralConfigurationAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('worldTitles')
            ->add('worldSubChampionships')
            ->add('wins')
            ->add('podiums')
            ->add('showResults')
            ->add('id')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('worldTitles')
            ->add('worldSubChampionships')
            ->add('wins')
            ->add('podiums')
            ->add('showResults', null, ['label' => 'Mostrar banda'])
//            ->add('id')
            ->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ])
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('worldTitles')
            ->add('worldSubChampionships')
            ->add('wins')
            ->add('podiums')
            ->add('showResults')
//            ->add('id')
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('worldTitles')
            ->add('worldSubChampionships')
            ->add('wins')
            ->add('podiums')
            ->add('showResults')
            ->add('id')
        ;
    }
}
