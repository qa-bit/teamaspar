<?php

namespace Application\Sonata\MediaBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class TeamStaffImageAdmin extends FeaturedMediaAdmin
{
    protected $baseRoutePattern = 'teamstaff-image-admin';
    protected $baseRouteName = 'teamstaff-image-admin';
    protected $classNameLabel = "teamstaff-image";
}
