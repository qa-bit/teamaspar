<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\ContentTrait;
use MotogpBundle\Entity\Traits\HasLogoTrait;
use MotogpBundle\Entity\Traits\HasMediaTrait;
use MotogpBundle\Entity\Traits\InModalityTrait;

/**
 * Sponsor
 *
 * @ORM\Table(name="sponsor")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\SponsorRepository")
 */
class Sponsor
{
    use ContentTrait, HasMediaTrait, InModalityTrait, HasLogoTrait;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=false)
     */
    private $webUrl;

    /**
     * @return string
     */
    public function getWebUrl()
    {
        return $this->webUrl;
    }

    /**
     * @param string $webUrl
     */
    public function setWebUrl($webUrl)
    {
        $this->webUrl = $webUrl;
    }

    /**
     * @var boolean;
     * @ORM\Column(type="boolean", nullable=true)
     */
    public $bn;

    /**
     * @return boolean
     */
    public function isBn()
    {
        return $this->bn;
    }

    /**
     * @param boolean $bn
     */
    public function setBn($bn)
    {
        $this->bn = $bn;
    }

    public function getGallery() {
        $g = new \stdClass();

        $g->medias = [$this->featuredMedia];

        return $g;
    }
}

