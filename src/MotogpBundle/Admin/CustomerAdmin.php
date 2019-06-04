<?php

namespace MotogpBundle\Admin;

use FOS\UserBundle\Util\PasswordUpdaterInterface;
use MotogpBundle\Services\Newsletters;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Sonata\AdminBundle\Form\Type\Filter\ChoiceType as ChoiceFilter;

class CustomerAdmin extends AbstractAdmin
{

    protected $datagridValues = [
        '_sort_order' => 'DESC',
        '_sort_by' => 'id',
    ];

    public function __construct($code, $class, $baseControllerName, Newsletters $newsletter, PasswordUpdaterInterface $passwordUpdater)
    {
        parent::__construct($code, $class, $baseControllerName);
        $this->ns = $newsletter;
        $this->passwordUpdater = $passwordUpdater;
    }


    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('email')
            ->add('phone')
            ->add('groups')
            ->add('type', null, [], 'choice', [
                'choices' => [
                    'public' => 'public',
                    'sponsor' => 'sponsor',
                    'media' => 'media',
                    'gpguest' => 'gpguest'
                ]])
            ->add('locale', null, [], 'choice', [
                'choices' => [
                    '' => '',
                    'es' => 'es',
                    'en' => 'en'
                ]
            ])
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            // ->add('id')
            ->add('fullName')
            ->add('email')
            ->add('userConfirmed', null, ['editable' => true])
            ->add('adminConfirmed', null, ['editable' => true])
            ->add('type')
            ->add('locale', null, ['label' => 'Idioma'])
            ->add('groups')
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
            ->tab('personal_info')
            ->with(' ')
            ->add('name' ,'text', array('required' => true, 'attr' => ['container_classes' => 'col-md-6']))
            ->add('surname' ,'text', array('required' => false, 'attr' => ['container_classes' => 'col-md-6']))
            ->add('phone' ,'text', array('required' => false, 'attr' => ['container_classes' => 'col-md-6']))
            ->add('email' ,'email', array('required' => true, 'attr' => ['container_classes' => 'col-md-6']))
            ->add('type', ChoiceType::class, array(
                'choices'  => array(
                    'public' => 'public',
                    'sponsor' => 'sponsor',
                    'media' => 'media',
                    'gpguest' => 'gpguest'
                ),'attr' => ['container_classes' => 'col-md-4'],
            ))
            ->add('mediaType', ChoiceType::class, array(
                    'required' => false,
                    'choices'  => array(
                        'media_pr' =>  'media_pr',
                        'media_radio' => 'media_radio',
                        'media_tv' => 'media_tv',
                        'media_web' => 'media_web',
                        'media_other' => 'media_other'
                    ), 'attr' => ['container_classes' => 'col-md-4'],
                )
            )
            ->add('locale', ChoiceType::class, array(
                'choices'  => array(
                    'Español' => 'es',
                    'Inglés' => 'en',
                ),'attr' => ['container_classes' => 'col-md-4'],
            ))
            ->add('groups')
            ->add('userConfirmed', 'checkbox', ['label' => 'Confirmado (usuario)', 'attr' => ['container_classes' => 'col-md-6'] ])
            ->add('adminConfirmed', 'checkbox', ['required' => false, 'mapped' => 'Confirmado (administración)', 'attr' => ['container_classes' => 'col-md-6']])
            ->add('sponsor', null, ['required' => false, 'label' => '(Tipo Partner)'])
            ->add('circuit', null, ['required' => false, 'label' => '(Tipo GP GUEST)'])
            ->end()
            ->end()
            ->tab('enterprise_info')
                ->with(' ')
                ->add('businessName')
                ->add('country')
                ->add('address')
                ->add('postalCode')
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
            ->add('surname')
            ->add('email')
            ->add('phone')

        ;
    }


    public function saveHook($object) {
        if (!$object->getAdminConfirmedTest()) {

            if ($object->getAdminConfirmed()) {

                $this->ns->sendConfirmEMail($object);
                $object->setAdminConfirmedTest(true);

                if ($object->getUser()) {
                    $object->getUser()->setEnabled(true);
                    $object->getUser()->setPlainPassword($object->getUser()->getPass());
                    $this->passwordUpdater->hashPassword($object->getUser());
                }

            }

        }
    }

    public function prePersist($object)
    {
        parent::prePersist($object);
        $this->saveHook($object);

    }

    public function preUpdate($object)
    {
        parent::preUpdate($object);
        $this->saveHook($object);

    }


}
