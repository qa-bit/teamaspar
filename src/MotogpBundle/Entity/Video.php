<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\ContentTrait;
use MotogpBundle\Entity\Traits\InCategoriesTrait;
use MotogpBundle\Entity\Traits\InCircuitTrait;
use MotogpBundle\Entity\Traits\InRiderTrait;
use MotogpBundle\Entity\Traits\InSeasonTrait;

/**
 * Videos
 *
 * @ORM\Table(name="video")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\VideoRepository")
 */
class Video
{

    use ContentTrait, InCategoriesTrait, InRiderTrait, InSeasonTrait, InCircuitTrait {
        InCategoriesTrait::__construct as inCategoriesTraitConstructor;
    }

    public function __construct()
    {
        $this->inCategoriesTraitConstructor();
    }

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="urlEN", type="string", length=255)
     */
    private $urlEN;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;


    /**
     * Set url
     *
     * @param string $url
     *
     * @return Video
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Video
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getUrlEN()
    {
        return $this->urlEN;
    }

    /**
     * @param string $urlEN
     */
    public function setUrlEN($urlEN)
    {
        $this->urlEN = $urlEN;
    }


    public function extractUrl() {
        preg_match('/\?v=.+$/', $this->url, $matches);

        if (count($matches))
            return str_replace('?v=', '', $matches[0]);

        return '';
    }
    
}

