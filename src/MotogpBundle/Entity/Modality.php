<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use MotogpBundle\Entity\Traits\ContentTrait;
use MotogpBundle\Entity\Traits\HasFooterImageTrait;
use MotogpBundle\Entity\Traits\HasHeaderImageTrait;

/**
 * Modality
 *
 * @ORM\Table(name="modality")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\ModalityRepository")
 */
class Modality
{
    use ContentTrait, HasFooterImageTrait, HasHeaderImageTrait;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $facebook;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $twitter;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $instagram;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $youtube;


    /**
     * @ORM\Column(type="string", nullable=true)
     * @var string
     */
    private $slug;




    /**
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @param string $facebook
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * @param string $twitter
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;
    }

    /**
     * @return string
     */
    public function getInstagram()
    {
        return $this->instagram;
    }

    /**
     * @param string $instagram
     */
    public function setInstagram($instagram)
    {
        $this->instagram = $instagram;
    }

    /**
     * @return string
     */
    public function getYoutube()
    {
        return $this->youtube;
    }

    /**
     * @param string $youtube
     */
    public function setYoutube($youtube)
    {
        $this->youtube = $youtube;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }
    
}