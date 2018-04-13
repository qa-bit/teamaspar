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
            ->add('post')
            ->add('customerTypes')
            ->add('groups')
            ->add('lastSendAt')
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

//        if (!count($this->getSubject()->getCustomerTypes())) {
//            $em = $this->modelManager->getEntityManager(CustomerType::class);
//            $ct = $em->getRepository(CustomerType::class)->findOneBySlug('public');
//
//            $this->getSubject()->addCustomerType($ct);
//
//        }

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
                    'required' => 'required',
                    'data-sonata-select2' => 'false',
                    'class' => 'form-control newsletter-post-selector'
                ]

            ])
            ->add('name', null, ['required' => true])
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


    public function filterByGroups($customers, $groups) {


        $customersInGroups = [];


        if (!count($groups)) {
            return $customers;
        }

        foreach ($customers as $customer) {
            foreach ($customer->getGroups() as $cg) {
                foreach ($groups as $g) {
                    if ($g->getId() == $cg->getId()) {
                        $customersInGroups[] = $customer;
                    }
                }
            }
        }

        return $customersInGroups;

    }

    public function sendMail($object, $locale) {


        $recipients = [];

        foreach ($object->getCustomerTypes() as $type) {
            $slug = $type->getSlug();
            $em = $this->modelManager->getEntityManager(CustomerType::class);
            $ct = $em->getRepository(Customer::class)->findByType($slug);

            $customers = $this->filterByGroups($ct, $object->getGroups());

            foreach ($customers as $c) {
                if ($c->getLocale() == $locale && $c->getUserConfirmed() && $c->getAdminConfirmed() )
                    $recipients[$c->getEmail()] = $c->getName();
            }
        }

        $mail = $this->getConfigurationPool()->getContainer()->getParameter('general_mailing');
        $from = $this->getConfigurationPool()->getContainer()->getParameter('mailer_user');
        $templating = $this->container->get('templating');

        $data = [
            'name' => $locale == 'es' ? $object->getName() : $object->getNameEN(),
            'title' => $locale == 'es' ? $object->getName() : $object->getNameEN(),
            'featuredMedia' => $object->getFeaturedMedia(),
            'medias' => $object->getMedia(),
            'newsletter' => $object,
            'body' => $locale == 'es' ? $object->getDescription()  : $object->getDescriptionEN(),
            'post' => $object->getPost(),
            'locale' => $locale
        ];


        $html = $templating->render('MotogpBundle:Default:Newsletters/newsletters-email.html.twig', $data,'text/html');
        
        $subjectTitle = $locale == 'es' ? $object->getName() : $object->getNameEN();

        $message = \Swift_Message::newInstance()
            ->setSubject('ANGEL NIETO TEAM - '.$subjectTitle)
            ->setFrom($from, 'Ángel Nieto Team')
            ->setBcc($recipients)
            ->setReplyTo($from)
            ->setContentType("text/html")
            ->setBody($html);


        $mailLogger = new \Swift_Plugins_Loggers_ArrayLogger();

        $this->container->get('mailer')->registerPlugin(new \Swift_Plugins_LoggerPlugin($mailLogger));

        $result = $this->container->get('mailer')->send($message);
        $spool = $this->container->get('mailer')->getTransport()->getSpool();
        $transport = $this->container->get('swiftmailer.transport.real');

        $spool->flushQueue($transport);

    }


    public function saveHook($object) {

        $this->saveMedias($object, 'motogp.admin.newsletter_media');
        $this->saveFeaturedMedia($object);




    }


    public function postPersist($object) {
        $action = $this->getForm()->get('actions')->getData();
        if ($action == 'update_and_send') {
            $this->sendMail($object, 'en');
            $this->sendMail($object, 'es');
            $object->setLastSendAt(new \DateTime());
        }
    }

    public function postUpdate($object) {
        $action = $this->getForm()->get('actions')->getData();
        if ($action == 'update_and_send') {
            $this->sendMail($object, 'en');
            $this->sendMail($object, 'es');
            $object->setLastSendAt(new \DateTime());

        }
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

        if ( $groups === null || !count($groups)) {

            $groups_error = 'Elija al menos un grupo.';
            $errorElement->with( 'groups' )->addViolation( $groups_error )->end();

        }

        if ( $categories === null || !count($categories)) {

            $error = 'Elija al menos una categoría.';
            $errorElement->with( 'customerTypes' )->addViolation( $error )->end();

        }

        if ( $post === null) {

            $error = 'Seleccione una publicación.';
            $errorElement->with( 'post' )->addViolation( $error )->end();

        }

    }

    public function getFormTheme()
    {
        return array_merge(
            parent::getFormTheme(),
            array('MotogpBundle:Admin:admin.theme.html.twig')
        );
    }

}
