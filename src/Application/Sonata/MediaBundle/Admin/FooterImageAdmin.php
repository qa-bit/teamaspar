<?php

namespace Application\Sonata\MediaBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Application\Sonata\MediaBundle\Admin\FeaturedMediaAdmin;

class FooterImageAdmin extends FeaturedMediaAdmin
{
    protected $baseRoutePattern = 'footerimage-admin';
    protected $baseRouteName = 'footerimage-admin';
    protected $classNameLabel = "footerimage";

}
