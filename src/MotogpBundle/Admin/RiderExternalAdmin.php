<?php

namespace MotogpBundle\Admin;

use MotogpBundle\Admin\Media\FeaturedMediaAdminTrait;
use MotogpBundle\Entity\RiderTeam;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use MotogpBundle\Admin\Media\LogoAdminTrait;
use Sonata\AdminBundle\Route\RouteCollection;

class RiderExternalAdmin extends AbstractAdmin
{
    protected $baseRoutePattern = 'rider-external-admin';
    protected $baseRouteName = 'rider-external-admin';
    protected $classNameLabel = "Rider external";
    
    use FeaturedMediaAdminTrait, LogoAdminTrait;

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('modality')
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
            ->add('surname')
            ->add('riderTeam', null, ['admin_code' => 'motogp.admin.rider_team'])
            ->add('modality')
            ->add('modalityClassification')
            ->add('moto')
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
            ->add('name', 'text', ['attr' => ['container_classes' => 'col-md-6'],])
            ->add('surname', 'text',['attr' => ['container_classes' => 'col-md-6'],])
            ->add('birthDate', 'sonata_type_date_picker', [
                'label' => 'Fecha de nacimiento',
                'format'=>'dd/MM/yyyy',
                'required' => false,
                'attr' => ['container_classes' => 'col-md-6'],
            ])
            ->add('birthPlace', null, ['label' => 'Lugar de nacimiento',
                'attr' => ['container_classes' => 'col-md-6'],
            ])
            ->add('modality', null, ['label' => 'Modalidad', 'required' => true, 'attr' => ['container_classes' => 'col-md-4']])
            ->add('modalityClassification', null, ['required' => false, 'attr' => ['container_classes' => 'col-md-4']])
            ->add('moto', null, ['required' => false, 'attr' => ['container_classes' => 'col-md-4'],])
            ->add('riderTeam', null,
                [
                    'class' => RiderTeam::class,
                    'query_builder' => function ($qb) {
                        $b = $qb->createQueryBuilder('s')->where('s.main IS NULL')
                        ;

                       return $b;
                    },
                    'required' => false,
                    'attr' => ['container_classes' => 'col-md-12']
                ], ['admin_code' => 'motogp.admin.rider_team']
            )

            ->add('featuredMedia', 'sonata_type_admin', array(
                'label' => 'Imágen de portada',
                'required' => false,
                'attr' => ['container_classes' => 'clearfix col-md-6']
            ))
            ->add('logo', 'sonata_type_admin', array(
                'label' => 'Logotipo',
                'required' => false,
                'attr' => ['container_classes' => 'clearfix col-md-6']
            ))
            ->add('_order', null, ['attr' => ['container_classes' => 'col-md-12']])

            ->end()
            ->end()
//            ->tab('Currículum')
//            ->with(null)
//            ->add('firstRace', null, [
//                'attr' => ['container_classes' => 'col-md-6'],
//                'label' => 'Primera carrera'])
//            ->add('firstGrandPrix', null, [
//                'attr' => ['container_classes' => 'col-md-6'],
//                'label' => 'Primer gran premio'])
//            ->add('firstVictory', null, [
//                'attr' => ['container_classes' => 'col-md-6'],
//                'label' => 'Primera victoria'])
//            ->add('lastVictory', null, [
//                'attr' => ['container_classes' => 'col-md-6'],
//                'label' => 'Última victoria'])
//            ->add('firstPole', null, [
//                'attr' => ['container_classes' => 'col-md-6'],
//                'label' => 'Primera Pole'])
//            ->add('firstFastLap', null, [
//                'attr' => ['container_classes' => 'col-md-6'],
//                'label' => 'Primera vuelta rápida'])
//            ->add('firstPodium', null, [
//                'attr' => ['container_classes' => 'col-md-6'],
//                'label' => 'Primer Podio'])
//            ->add('victorys', null, [
//                'attr' => ['container_classes' => 'col-md-6'],
//                'label' => 'Victorias'])
//            ->add('poles', null, [
//                'attr' => ['container_classes' => 'col-md-6'],
//                'label' => 'Podios'])
//            ->add('fastLaps', null, [
//                'attr' => ['container_classes' => 'col-md-6'],
//                'label' => 'Vueltas rápidas'])
//            ->add('bestGeneralResult', null, [
//                'attr' => ['container_classes' => 'col-md-6'],
//                'label' => 'Mejor resultado general'])
//            ->add('gpss', null, [
//                'attr' => ['container_classes' => 'col-md-6'],
//                'label' => 'Nº total de GPS disputados'])
//            ->add('victoryList', 'ckeditor', [
//                'attr' => ['container_classes' => 'col-md-12'],
//                'label' => 'Palmáres deportivo',
//                'required' => false
//            ])
//
//            ->add('firstRaceEN', null, [
//                'attr' => ['container_classes' => 'col-md-6'],
//                'label' => 'Primera carrera (EN)'])
//            ->add('firstGrandPrixEN', null, [
//                'attr' => ['container_classes' => 'col-md-6'],
//                'label' => 'Primer gran premio (EN)'])
//            ->add('firstVictoryEN', null, [
//                'attr' => ['container_classes' => 'col-md-6'],
//                'label' => 'Primera victoria (EN)'])
//            ->add('lastVictoryEN', null, [
//                'attr' => ['container_classes' => 'col-md-6'],
//                'label' => 'Última victoria (EN)'])
//            ->add('firstPoleEN', null, [
//                'attr' => ['container_classes' => 'col-md-6'],
//                'label' => 'Primera pole (EN)'])
//            ->add('firstFastLapEN', null, [
//                'attr' => ['container_classes' => 'col-md-6'],
//                'label' => 'Primera vuelta rápida(EN)'])
//            ->add('firstPodiumEN', null, [
//                'attr' => ['container_classes' => 'col-md-6'],
//                'label' => 'Primer podio(EN)'])
//            ->add('victorysEN', null, [
//                'attr' => ['container_classes' => 'col-md-6'],
//                'label' => 'Victorias (EN)'])
//            ->add('polesEN', null, [
//                'attr' => ['container_classes' => 'col-md-6'],
//                'label' => 'Poles (EN)'])
//            ->add('fastLapsEN', null, [
//                'attr' => ['container_classes' => 'col-md-6'],
//                'label' => 'Vueltas rápidas(EN)'])
//            ->add('bestGeneralResultEN', null, [
//                'attr' => ['container_classes' => 'col-md-6'],
//                'label' => 'Mejor resultado general(EN)'])
//            ->add('gpssEN', null, [
//                'attr' => ['container_classes' => 'col-md-6'],
//                'label' => 'Nº total de GPS disputados (EN) '])
//            ->add('victoryListEN', 'ckeditor', ['label' => 'Palmarés deportivo (EN) ', 'required' => false])
//            ->end()
//            ->end()
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


    public function saveHook($object) {
        $this->saveLogo($object);
        $this->saveFeaturedMedia($object);
        $object->setExternal(true);
    }

    public function preUpdate($object) {

        $this->saveHook($object);
    }

    public function prePersist($object) {
        $this->saveHook($object);
    }

    public function getFormTheme()
    {
        return array_merge(
            parent::getFormTheme(),
            array('MotogpBundle:Admin:admin.theme.html.twig')
        );
    }

    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $query->innerJoin($query->getRootAliases()[0] . '.riderTeam', 'r')
            ->andWhere(
                $query->expr()->isNull('r.main')
            );

        return $query;
    }

}
