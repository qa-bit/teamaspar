<?php

namespace MotogpBundle\Twig;

use MotogpBundle\Entity\Rider;

class GetDataExtension extends \Twig_Extension
{

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('modality_home_riders', array($this, 'getHomeRiders'))
        );
    }

    public function getHomeRiders($modality)
    {
        $em = $this->container->get('doctrine')->getEntityManager();
        return $em->getRepository(Rider::class)->getHomeRidersInModalitySlug($modality);
    }

}