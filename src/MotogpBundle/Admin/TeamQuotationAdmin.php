<?php

namespace MotogpBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class TeamQuotationAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
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
            ->add('rider', null, [
                'query_builder' => function($er) {
                    return $er->createQueryBuilder('r')
                        ->innerJoin('r.riderTeam', 'rt')
                        ->orderBy('r.name', 'ASC')
                        ->where('rt.main IS NOT NULL');
                },
                'required' => false,
                'attr' => ['class' => 'riderSelect']], ['admin_code' => 'motogp.admin.rider'])
            ->add('teamMember', null, ['label'=> 'Team', 'required' => false,'attr' => ['class' => 'teamSelect']])
            ->add('description', 'ckeditor', ['label' => 'Texto'])
            ->add('descriptionEN', 'ckeditor', ['label' => 'Texto (Inglés)'])
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
        ;
    }
}
