<?php

namespace MotogpBundle\Admin;

use MotogpBundle\Entity\Customer;
use MotogpBundle\Entity\CustomerType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\CoreBundle\Validator\ErrorElement;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use MotogpBundle\Admin\Media\HasMediasAdminTrait;
use MotogpBundle\Admin\Media\FeaturedMediaAdminTrait;


class NewsletterAdmin extends AbstractAdmin
{


    use HasMediasAdminTrait, FeaturedMediaAdminTrait;
    private $container;


    public function setContainer($container) {
        $this->container = $container;
    }

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
            ->add('post', null, ['label' => 'Post'])
            ->add('customerTypes')
            ->add('groups')
            ->add('lastSendAt', null, ['format' => 'd/m/y H:i'])
            ->add('queued', null, ['label' => 'En cola'])
            ->add('failed', null, ['label' => 'Envío fallido'])
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
            ->add('post', null, [
                'query_builder' => function ($qb) {

                    return $qb->createQueryBuilder('p')
                        ->orderBy('p.publishedAt', 'DESC');
                },
                'required' => false,
                'label' => 'Publicación',
                'attr' => [
                    'data-sonata-select2' => 'false',
                    'class' => 'form-control newsletter-post-selector'
                ]

            ])
            ->add('name', null, ['required' => true])
            ->add('modality', null, ['required' => true, 'label' => 'Modalidad (sólo para newsletters sin Post asociado)'])
            ->add('nameEN', null, ['required' => true])

            ->add('customerTypes', null, ['required' => true])
            ->add('groups')
            ->add('actions', ChoiceType::class, array(
                'mapped' => false,
                'label' => 'Acción',
                'choices'  => array(
                    'Solo actualizar' => 'update',
                    'Actualizar y enviar' => 'update_and_send',
                ),
            ))
            ->end()
            ->end()
            ->tab('Contenido')
            ->with(null)
            ->add('name', null, ['label' => 'Título', 'required' => true])
            ->add('nameEN', null, ['label' => 'Título (Inglés)', 'required' => true])
            ->add('description', 'ckeditor', array(
                'label' => 'Contenido'
            ))
            ->add('descriptionEN', 'ckeditor', array(
                'label' => 'Contenido Inglés'
            ))
            ->end()
            ->end()
            ->tab('Imágenes')
            ->with(null)
            ->add('featuredMedia', 'sonata_type_admin', array(
                'label' => 'Imágen de portada',
                'required' => false,
            ))
            ->add('medias', 'sonata_type_collection', ['label' => 'Imágenes'],
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
                'attr' => [
                    'data-sonata-select2' => 'false',
                    'container_classes' => 'col-md-12'
                ]
            ], [
                'admin_code' => 'motogp.admin.gallery'
            ])
            ->end()
            ->end()
            ->tab('Citas')
            ->with(null)
            ->add('teamQuotations', 'sonata_type_collection', [], ['edit' => 'inline', 'inline' => 'table'])
            ->end()
            ->end()
            ->tab('Estado')
                ->with(null)
                ->add('failed', null, ['attr'=> ['readonly' => true], 'label' => 'Envío fallido'])
                ->add('errorMessage', null, ['attr'=> ['readonly' => true], 'label' => 'Mensaje de error'])
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
        ;
    }


    public function saveHook($object) {

        $action = $this->getForm()->get('actions')->getData();
        if ($action == 'update_and_send') {
            $object->setQueued(true);
        }

        
        $this->saveMedias($object, 'motogp.admin.newsletter_media');
        $this->saveFeaturedMedia($object);

        //TODO: tell why newsletter id is not getting set in
        //TODO: Newsletter->addTeamQuotation
        foreach ($object->getTeamQuotations() as $quotation) {
            $quotation->setNewsletter($object);
        }
    }
    
    public function postPersist($object) {
        $action = $this->getForm()->get('actions')->getData();
        if ($action == 'update_and_send') {
            //$this->sendMail($object, 'en');
            //$this->sendMail($object, 'es');
            //$object->setLastSendAt(new \DateTime());
        }
    }

    public function postUpdate($object) {

    }


    public function preUpdate($object) {

        $this->saveHook($object);
    }

    public function prePersist($object) {
        $this->saveHook($object);
    }


    public function validate(ErrorElement $errorElement, $object ) {

        $categories = $object->getCustomerType();

        $groups = $object->getGroups();

        $post = $object->getPost();

//        if ( $groups === null || !count($groups)) {
//
//            $groups_error = 'Elija al menos un grupo.';
//            $errorElement->with( 'groups' )->addViolation( $groups_error )->end();
//
//        }

        if ( $categories === null || !count($categories)) {

            $error = 'Elija al menos una categoría.';
            $errorElement->with( 'customerTypes' )->addViolation( $error )->end();

        }

//        if ( $post === null) {
//
//            $error = 'Seleccione una publicación.';
//            $errorElement->with( 'post' )->addViolation( $error )->end();
//
//        }

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
        $query->orderBy($query->getRootAliases()[0] . '.id', 'DESC');

        return $query;
    }

}
