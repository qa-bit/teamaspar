<?php

namespace MotogpBundle\Entity;

use Application\Sonata\MediaBundle\Entity\PostMedia;
use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\ContentTrait;
use MotogpBundle\Entity\Traits\InCategoryTrait;
use MotogpBundle\Entity\Traits\InCircuitTrait;
use MotogpBundle\Entity\Traits\InModalityTrait;
use MotogpBundle\Entity\Traits\HasMediaTrait;
use MotogpBundle\Entity\Traits\InRiderTrait;
use MotogpBundle\Entity\Traits\InSeasonTrait;
use MotogpBundle\Entity\Traits\InRaceTrait;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Post
 *
 * @ORM\Table(name="gallery")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\GalleryRepository")
 */
class Gallery
{
    use
        ContentTrait,
        InCategoryTrait,
        InModalityTrait,
        HasMediaTrait,
        InSeasonTrait,
        InCircuitTrait,
        InRiderTrait,
        InRaceTrait
    {
        
    }

    public function __construct()
    {
        $this->medias = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }

    /**
     * @var PostMedia
     *
     * @ORM\OneToMany(targetEntity="Application\Sonata\MediaBundle\Entity\GalleryMedia", mappedBy="owner", cascade={"all"}, orphanRemoval=true)
     * @ORM\OrderBy
     */
    private $medias;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $slug;


    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $circuitOrder;

    /**
     * @return Media
     */
    public function getMedias()
    {
        return $this->medias;
    }

    /**
     * @param Media $medias
     */
    public function setMedia(PostMedia $media)
    {
        $this->medias = $media;
    }

    /**
     * @param $category
     * @return $this
     */
    public function addMedia($media)
    {
        if (!$this->medias->contains($media)) {
            $media->setOwner($this);
            $this->medias->add($media);
        }
    }


    /**
     * @param $category
     * @return $this
     */
    public function addMedias($media)
    {
        if (!$this->medias->contains($media)) {
            $media->setOwner($this);
            $this->medias->add($media);
        }
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

    /**
     * @return int
     */
    public function getCircuitOrder()
    {
        return $this->circuitOrder;
    }

    /**
     * @param int $circuitOrder
     */
    public function setCircuitOrder($circuitOrder)
    {
        $this->circuitOrder = $circuitOrder;
    }
    
}