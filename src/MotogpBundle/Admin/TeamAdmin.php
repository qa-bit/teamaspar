<?php

namespace MotogpBundle\Admin;

use MotogpBundle\Admin\Media\FeaturedMediaAdminTrait;
use MotogpBundle\Entity\Traits\HasMediaGalleryTrait;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use MotogpBundle\Entity\RiderTeam;
use MotogpBundle\Entity\Rider;
use Symfony\Component\Form\Extension\Core\Type\CountryType;

class TeamAdmin extends AbstractAdmin
{

    use FeaturedMediaAdminTrait;

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
            ->add('country')
            ->add('modalities')
            ->add('rider', null, ['admin_code' => 'motogp.admin.rider'])
            ->add('teamCategory', null, array('editable' => true))
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
            ->add('name', null, ['label' => 'Nombre y apellidos'])
            ->add('teamCategory', null, ['required' => true, 'attr' => $mediumColumn])
            ->add('modalities', null, ['required' => true, 'attr' => ['container_classes' => 'col-md-6']])
            ->add('country', CountryType::class, ['label' => 'País',
                'attr' => ['container_classes' => 'col-md-6'],
            ])
            ->add('riderTeam', null,
                [
                    'class' => RiderTeam::class,
                    'query_builder' => function ($qb) {
                        $b = $qb->createQueryBuilder('s')->where('s.main = :m')
                            ->setParameter('m', '1')

                        ;

                        return $b;
                    },
                    'required' => false,
                    'attr' => ['container_classes' => 'hidden']
                ], ['admin_code' => 'motogp.admin.rider_team', 'required' => false]
            )
            ->add('rider', null,
                [
                    'label' => 'Equipo/Piloto',
                    'empty_data'  => null,
                    'placeholder' => " - Equipo",
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
            ->add('_order', null, ['required' => false, 'attr' => $mediumColumn])
            ->add('description','ckeditor', array(
            ))
            ->add('descriptionEN', 'ckeditor')


            ->end()
            ->end()
            ->tab('Imágenes')
                ->with(null)
                    ->add('featuredMedia', 'sonata_type_admin', array(
                        'label' => 'Imágen de portada',
                        'required' => false,
                    ))
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

        $this->saveFeaturedMedia($object);

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
    
    


}
