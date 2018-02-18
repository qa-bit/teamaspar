<?php

namespace MotogpBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class RaceAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('nameEN')
            ->add('start')
            ->add('end')
            ->add('season')
            ->add('circuit')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name')
            ->add('season')
            ->add('circuit')
            ->add('start')
            ->add('end')
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
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
                    ->add('start', null, [], ['container_class' => 'col-md-6'])
                    ->add('end', null, [], ['container_classes' => 'col-md-6'])
                    ->add('season', null, ['required' => true])
                    ->add('circuit', null, ['required' => true])
                    ->end()
                ->end()
            ->tab('Resultados')
                ->with(null)
                ->add('scores', 'sonata_type_collection', [],
                    [
                        'edit' => 'inline',
                        'inline' => 'table'
                    ]
                    )
                ->end()
            ->end();
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('start')
            ->add('scores')
            ->add('end')
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

    public function prePersist($object) {
        foreach($object->getScores() as $score) {
            $score->setRace($object);
        }
    }

    public function preUpdate($object) {
        foreach($object->getScores() as $score) {
            $score->setRace($object);
        }
    }

}
