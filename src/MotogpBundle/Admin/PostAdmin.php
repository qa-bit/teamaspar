<?php

namespace MotogpBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\FormatterBundle\Form\Type\SimpleFormatterType;

class PostAdmin extends AbstractAdmin
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
            //->add('id')
            ->add('name')
            ->add('categories')
            //->add('nameEN')
            //->add('description')
            //->add('descriptionEN')
            //->add('seoTitle')
            //->add('seoTitleEN')
            //->add('seoKeywords')
            //->add('seoKeywordsEN')
            ->add('_order')
            ->add('createdAt')
            ->add('updatedAt')
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
                        ->add('description', 'ckeditor', array(
                            'label' => 'Contenido'
                        ))
                        ->add('descriptionEN', 'ckeditor', array(
                            'label' => 'Contenido Inglés'
                        ))
                        ->add('modality', null,
                            ['required' => true]
                            )
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

                        ->add('_order')
                    ->end()
                ->end()
            ->tab('Imágenes')
                ->with(null)
                ->add('media', 'sonata_media_type', array(
                    'label' => 'Imágen de portada',
                    'provider' => 'sonata.media.provider.image',
                    'context'  => 'imagenes'
                ))

             ->add('medias', 'sonata_type_collection', array(), array(
                 'edit' => 'inline',
                 'inline' => 'table',
                 'link_parameters' => array(
                     'context' => 'imagenes',
                     'provider' => 'sonata.media.provider.image'
                 )
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
}
