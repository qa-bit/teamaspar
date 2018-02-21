<?php

namespace Application\Sonata\MediaBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Application\Sonata\MediaBundle\Admin\PostMediaAdmin;

class GalleryMediaAdmin extends PostMediaAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {

        parent::configureFormFields($formMapper);

        $formMapper
            //->add('name')
            //->add('description')
            //->add('enabled')
            //->add('providerName')
            //->add('providerStatus')
            ->add('rider')
        ;
    }

}
