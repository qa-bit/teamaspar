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
use Sonata\AdminBundle\Route\RouteCollection;

class SliderAdmin extends GalleryAdmin
{
    protected $baseRoutePattern = 'slider-admin';
    protected $baseRouteName = 'slider-admin';
    protected $classNameLabel = "Slider";

    use HasMediasAdminTrait, FeaturedMediaAdminTrait;

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
            ->add('name')
            ->add('modality')
            ->add('_action', null, array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array()
                ),
            ))
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('Información')
            ->with(null)
            ->add('name',null, ['attr' => ['readonly' => true]])
            ->add('nameEN')
            ->add('categories', 'sonata_type_model', [
                'label' => 'Tags',
                'multiple' => true
            ])
            ->end()
            ->end()
            ->tab('Imágenes')
            ->with(null)
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
            ->add('slug',null, ['attr' => ['readonly' => true]])
            ->end()
            ->end()
        ;
    }

    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);

        $query->where(
            $query->expr()->isNotNull($query->getRootAliases()[0] . '.slug')
        );


        return $query;
    }


    protected function configureRoutes(RouteCollection $collection)
    {
        $isSuperAdmin = $this->isGranted('ROLE_SUPER_ADMIN');

        //if (!$isSuperAdmin) {
            $collection
                ->remove('create')
                ->remove('delete');
        //}
    }

}
