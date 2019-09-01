<?php

namespace MotogpBundle\Admin;

use MotogpBundle\Entity\Document;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\CoreBundle\Form\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType as SCollectionType;
use Sonata\MediaBundle\Form\Type\MediaType;

class DocumentAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('modalities')
            ->add('locales')
            ->add('circuit')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name')
            ->add('modalities')
            ->add('localesTxt', null, ['label' => 'Idiomas'])
            ->add('circuit')
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
            ->add('nameEN')
            ->add('modalities')

            ->add('circuit', null, ['required' => true])
            ->add('document', MediaType::class,
                [
                    'label' => 'Fichero',
                    'context' => 'mgp_document',
                    'provider' => 'sonata.media.provider.file'
                ])
            ->add('locales', SCollectionType::class, [
                'label' => 'Idiomas',
                'entry_type' => ChoiceType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'entry_options' => [

                    'choices' => ['Español' => 0, 'Inglés' => 1]]])
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
