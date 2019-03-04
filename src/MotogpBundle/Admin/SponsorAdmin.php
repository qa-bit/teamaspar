<?php

namespace MotogpBundle\Admin;

use MotogpBundle\Admin\Media\FeaturedMediaAdminTrait;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use MotogpBundle\Admin\Media\LogoAdminTrait;
use Sonata\AdminBundle\Route\RouteCollection;
use Cocur\Slugify\Slugify;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SponsorAdmin extends AbstractAdmin
{

    use FeaturedMediaAdminTrait, LogoAdminTrait;
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('modalities')
            ->add('bn')
            ->add('level')
            ->add('_order')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name')
            ->add('webUrl')
            ->add('modalities')
            ->add('bn', null, ['editable' => true ])
            ->add('_order', null, ['editable' => true, 'orderable' => true ])
            ->add('level', null, ['editable' => true ])

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
            ->add('name')
            ->add('description', 'ckeditor')
            ->add('descriptionEN', 'ckeditor')
            ->add('modalities', null, ['required' => true])
            ->add('logo', 'sonata_type_admin', array(
                'label' => 'Logo',
                'required' => false,
            ))
            ->add('featuredMedia', 'sonata_type_admin', array(
                'label' => 'Imágen de portada',
                'required' => false,
            ))
            ->add('webUrl')
            ->add('webUrlEN')
            ->add('_order')
            ->add('bn', 'checkbox', ['label' => 'B/N', 'required' => false ])
            ->add('level',ChoiceType::class, ['choices' => [3 => 3, 2 => 2, 1 => 1]])
            ->add('enabled', 'checkbox', ['label' => 'Habilitado', 'required' => false ])
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('webUrl')
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

        $slugify = new Slugify();

        $name = $object->getName();
        $object->setSlug($slugify->slugify($name, '-'));

        $this->saveFeaturedMedia($object);
        $this->saveLogo($object);

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
