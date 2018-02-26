<?php

namespace Application\Sonata\MediaBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Application\Sonata\MediaBundle\Admin\FeaturedMediaAdmin;

class LogoAdmin extends FeaturedMediaAdmin
{
    protected $baseRoutePattern = 'logo-admin';
    protected $baseRouteName = 'logo-admin';
    protected $classNameLabel = "logo";

}
