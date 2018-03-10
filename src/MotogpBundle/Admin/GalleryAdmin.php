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

class GalleryAdmin extends AbstractAdmin
{


    use HasMediasAdminTrait, FeaturedMediaAdminTrait;
    
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
            ->add('name')
            ->add('circuit', null, ['label' => 'Circuito'])
            ->add('categories')
            ->add('modality')
            ->add('_action', null, array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array()
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
                        ->add('categories', 'sonata_type_model', [
                            'label' => 'Tags',
                            'multiple' => true
                        ])
                        ->add('circuit', null,
                            [
                                'label' => 'Circuito',
                            ], ['btn_add' => false]
                        )
                        ->add('race', null, ['label' => 'Carrera'])
                        ->add('modality')
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

        $this->saveMedias($object, 'motogp.admin.gallery_media');
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

    public function getRiders() {
        $container = $this->getConfigurationPool()->getContainer();
        $em = $container->get('doctrine.orm.entity_manager');
        $riders = $em->getRepository(Rider::class)->findInternalRiders();

        return $riders;

    }

    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $query->andWhere(
            $query->expr()->isNull($query->getRootAliases()[0] . '.slug')
        );

        return $query;
    }
}
