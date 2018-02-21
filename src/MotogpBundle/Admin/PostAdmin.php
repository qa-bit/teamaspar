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
                                'attr' => $mediumColumn
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

                        ->add('rider', null, ['required' => false])
                        ->add('season', null, ['required' => true])
                        ->add('circuit', null, [
                            'label' => 'Circuito',
                            'required' => false
                        ])
                        ->add('categories', 'sonata_type_model', [
                            'label' => 'Tags',
                            'multiple' => true
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
            array('MotogpBundle:Default:admin.theme.html.twig')
        );
    }
}
