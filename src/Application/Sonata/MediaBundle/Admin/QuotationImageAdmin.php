<?php

namespace Application\Sonata\MediaBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class QuotationImageAdmin extends FeaturedMediaAdmin
{
    protected $baseRoutePattern = 'quotation-image-admin';
    protected $baseRouteName = 'quotation-image-admin';
    protected $classNameLabel = "quotation-image";

//    public function saveHook($object) {
//
//
//        dump($object);
//        dump($object->getUploadFile());
//
//        die();
//
//        if ($object->getUploadFile()  && ($path = $object->getUploadFile())) {
//            $media_sizes = getimagesize($path);
//            $object->setWidth($media_sizes[0]);
//            $object->setHeight($media_sizes[1]);
//            $object->setBinaryContent($path);
//        }
//        return $object;
//    }

}
