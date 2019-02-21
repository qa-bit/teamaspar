<?php

namespace MotogpBundle\Admin;

use MotogpBundle\Entity\Modality;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use MotogpBundle\Entity\Rider;

class RaceAdmin extends AbstractAdmin
{


    protected $datagridValues = [
        '_sort_order' => 'DESC',
        '_sort_by' => 'start',
    ];

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
            ->add('modality')
            ->add('modalityClassification')
            ->add('start', null, ['format' => 'd-m-Y'])
            ->add('end', null, ['format' => 'd-m-Y'])
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
            ->add('season', null, [
                'required' => true, 'attr' => $mediumColumn,
                'query_builder' => function ($qb) {
                    return $qb->createQueryBuilder('o')
                        ->orderBy('o.current', 'DESC');
                },
            ])
            ->add('circuit', null, ['required' => true, 'attr' => $mediumColumn])
            ->add('modality', null, [
                'required' => true,
                'label' => 'Modalidad',
                'attr' => [
                    'required' => 'required',
                    'data-sonata-select2' => 'false',
                    'class' => 'form-control race-modality-selector'
                ]
            ])
            ->add('modality', null, [
                'required' => true,
                'label' => 'Modalidad',
                'attr' => [
                    'required' => 'required',
                    'data-sonata-select2' => 'false',
                    'class' => 'form-control race-modality-selector'
                ]
            ])
            ->add('modalityClassification', null, [
                'required' => false,
                'label' => 'Clasificación',
                'attr' => [
                    'required' => false,
                    'data-sonata-select2' => 'false',
                    'class' => 'form-control race-modality-classification-selector'
                ]
            ])
            ->add('name')
            ->add('nameEN')
            ->add('start', 'sonata_type_date_picker', [
                'format'=>'dd/MM/yyyy',
                'attr' => $mediumColumn])
            ->add('end', 'sonata_type_date_picker', [
                'format'=>'dd/MM/yyyy',
                'attr' => $mediumColumn])

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

    public function getFormTheme()
    {
        return array_merge(
            parent::getFormTheme(),
            array('MotogpBundle:Admin:admin.theme.html.twig')
        );
    }


    public function getRiders() {

        $container = $this->getConfigurationPool()->getContainer();
        $em = $container->get('doctrine.orm.entity_manager');

        $modalities = $em->getRepository(Modality::class)->findAll();
        $riders = [];

        foreach ($modalities as $m) {
            $mid = $m->getId();
            $r = [];

            foreach ($em->getRepository(Rider::class)->getRidersInModality($mid) as $rider) {
                $riderObj = new \stdClass();
                $riderObj->id = $rider->getId();
                $riderObj->name = $rider->getName().' '.$rider->getSurname();
                $riderObj->modalityClassification = $rider->getModalityClassification() ? $rider->getModalityClassification()->getId() : null;

                $r[] = $riderObj;
            }

            $riders[$mid] = $r;
        }


        return $riders;
    }

}

