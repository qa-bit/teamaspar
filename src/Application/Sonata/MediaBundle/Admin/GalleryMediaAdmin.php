<?php

namespace Application\Sonata\MediaBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use MotogpBundle\Entity\Rider;

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
            ->add('rider', null,
                [
                    'class' => Rider::class,
                    'query_builder' => function ($qb) {
                        $b = $qb->createQueryBuilder('s')
                            ->innerJoin('s.riderTeam', 'r')
                            ->where('r.main IS NOT NULL');

                        return $b;
                    },
                    'required' => true,
                    'attr' => ['container_classes' => 'col-md-6']
                ], ['admin_code' => 'motogp.admin.rider']
            )
            ->add('title')
        ;
    }

}
