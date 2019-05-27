<?php

namespace MotogpBundle\Admin;

use MotogpBundle\Entity\Document;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Sonata\MediaBundle\Form\Type\MediaType;

class DocumentAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('modality')
            ->add('circuit')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name')
            ->add('modality')
            ->add('circuit')
            ->add('locale2', null, ['label' => 'Idioma'])
            ->add('documenturl', 'url', ['label' => 'Fichero'])

            ->add('_action', null, [
                'actions' => [
                    'edit' => [],
                    'delete' => [],
                ],
            ])
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
            ->add('locale', ChoiceType::class, ['choices' => array_flip(Document::LOCALES)])
            ->add('modality', null, ['required' => true])
            ->add('circuit', null, ['required' => true])
            ->add('document', MediaType::class,
                [
                    'label' => 'Fichero',
                    'context' => 'mgp_document',
                    'provider' => 'sonata.media.provider.file'
                ])
            ->end()
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('createdAt')
            ->add('updatedAt')
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
            ->add('slug')
            ->add('slugEN')
        ;
    }
}
