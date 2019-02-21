<?php

namespace MotogpBundle\Twig;

use MotogpBundle\Entity\Circuit;
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
            new \Twig_SimpleFilter('modality_home_riders', array($this, 'getHomeRiders')),
            new \Twig_SimpleFilter('modality_years_with_news', array($this, 'getModalityYearsWithNews')),
            new \Twig_SimpleFilter('modality_years_with_images', array($this, 'getModalityYearsWithImages'))
        );
    }

    public function getHomeRiders($modality)
    {
        $em = $this->container->get('doctrine')->getEntityManager();
        return $em->getRepository(Rider::class)->getHomeRidersInModalitySlug($modality);
    }


    public function getModalityYearsWithNews($modality) {
        $em = $this->container->get('doctrine')->getEntityManager();

        $year = (new \DateTime())->format('Y');

        $yearInt = (int) $year;

        $years = [];

        for ($i = $yearInt; $i >= ($yearInt - 20); $i--) {

            $cp = $em->getRepository(Circuit::class)->getCircuitsWithPostsInModalityAndYear($modality, $i);
            if ($cp != null && $cp > 0) {
                $years[] = $i;
            }
        }

        return $years;
    }

    public function getModalityYearsWithImages($modality) {
        $em = $this->container->get('doctrine')->getEntityManager();

        $year = (new \DateTime())->format('Y');

        $yearInt = (int) $year;

        $years = [];

        for ($i = $yearInt; $i >= ($yearInt - 20); $i--) {

            $cp = $em->getRepository(Circuit::class)->getCircuitsWithGalleryInModalityAndYear($modality, $i);
            if ($cp != null && $cp > 0) {
                $years[] = $i;
            }
        }

        return $years;
    }

}