<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\ContentTrait;
use MotogpBundle\Entity\Traits\HasLogoTrait;
use MotogpBundle\Entity\Traits\HasMediaTrait;
use MotogpBundle\Entity\Traits\InModalitiesTrait;
use MotogpBundle\Entity\Traits\InModalityTrait;


/**
 * Sponsor
 *
 * @ORM\Table(name="sponsor")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\SponsorRepository")
 */
class Sponsor
{
    use ContentTrait, HasMediaTrait, InModalitiesTrait, HasLogoTrait;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=false)
     */
    private $webUrl;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $enabled;


    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=false)
     */
    private $webUrlEN;


    /**
     * @var integer
     * @ORM\Column(name="_level", type="integer", nullable=false)
     */

    private $level;

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

    /**
     * @return string
     */
    public function getWebUrlEN()
    {
        return $this->webUrlEN;
    }

    /**
     * @param string $webUrlEN
     */
    public function setWebUrlEN($webUrlEN)
    {
        $this->webUrlEN = $webUrlEN;
    }

    /**
     * @return mixed
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param mixed $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }
    
}

