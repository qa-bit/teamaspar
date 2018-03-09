<?php

namespace MotogpBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\FormatterBundle\Form\Type\SimpleFormatterType;
use MotogpBundle\Admin\Media\HasMediasAdminTrait;
use MotogpBundle\Admin\Media\FeaturedMediaAdminTrait;
use MotogpBundle\Entity\Rider;
use Sonata\AdminBundle\Route\RouteCollection;

class PostAdmin extends AbstractAdmin
{


    use HasMediasAdminTrait, FeaturedMediaAdminTrait;
    
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
            ->add('modality', null, ['label' => 'Modalidad'])
            ->add('categories', null, ['label' => 'Tags'])
            ->add('publishedAt', 'date', ['label' => 'Fecha', 'format' => 'd-m-Y'])
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
                        ->add('publishedAt', 'sonata_type_date_picker',
                            [
                                'required' => true,
                                'label' => 'Fecha',
                                'format'=>'dd/MM/yyyy',
                                'attr' => array_merge($mediumColumn, ['data-date-format' => 'dd-mm-Y'])
                            ],
                            [
                                'date-format' => 'D'
                            ]
                        )
                        ->add('modality', null,
                            [
                                'required' => true,
                                'label' => 'Modalidad',
                                'attr' => $mediumColumn
                            ]
                        )
                        ->add('name', null, ['label' => 'Título'])
                        ->add('nameEN', null, ['label' => 'Título (Inglés)'])
                        ->add('description', 'ckeditor', array(
                            'label' => 'Contenido'
                        ))
                        ->add('descriptionEN', 'ckeditor', array(
                            'label' => 'Contenido Inglés'
                        ))

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

                        ->add('_order', 'hidden')
                    ->end()
                ->end()
            ->tab('Imágenes')
                ->with(null)
                ->add('featuredMedia', 'sonata_type_admin', array(
                    'label' => 'Imágen de portada',
                    'required' => false,
                ))
                ->add('medias', 'sonata_type_collection',['label' => 'Imágenes',],
                    [
                        'edit' => 'inline',
                        'inline' => 'table',
                    ]
                    )
                ->add('gallery', null, [
                    'label' => 'Galería',
                    'multiple' => false,
                    'required' => false,
                    'query_builder' => function ($qb) {
                        $b = $qb->createQueryBuilder('s')
                            ->where('s.slug is NULL');

                        return $b;
                    },
                    'attr' => ['container_classes' => 'col-md-12']
                ], [
                    'admin_code' => 'motogp.admin.gallery'
                ])
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



    public function saveHook($object) {

        $this->saveMedias($object, 'motogp.admin.post_media');
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
