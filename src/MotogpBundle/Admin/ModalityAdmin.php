<?php

namespace MotogpBundle\Admin;

use MotogpBundle\Admin\Media\HeaderImageAdminTrait;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use MotogpBundle\Admin\Media\FooterImageAdminTrait;

class ModalityAdmin extends AbstractAdmin
{
    use FooterImageAdminTrait, HeaderImageAdminTrait;
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
            ->add('description')
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
            ->add('name', null, [
                    'required' => true
                ]
            )
            ->add('nameEN')
            ->add('description', 'ckeditor')
            ->add('descriptionEN', 'ckeditor')
            ->add('_order')
            ->end()
            ->end()
            ->tab('Newsletters')
            ->with(null)
            ->add('headerImage', 'sonata_type_admin', array(
                'label' => 'Cabecera',
                'required' => false,
                'attr' => ['container_classes' => 'clearfix col-md-6']
            ))
            ->add('footerImage', 'sonata_type_admin', array(
                'label' => 'Footer',
                'required' => false,
                'attr' => ['container_classes' => 'clearfix col-md-6']
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

    protected function configureRoutes(RouteCollection $collection)
    {

        //if (!$isSuperAdmin) {
        $collection
            ->remove('create')
            ->remove('delete');
        //}
    }


    public function saveHook($object) {
        $this->saveFooterImage($object);
        $this->saveHeaderImage($object);
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
