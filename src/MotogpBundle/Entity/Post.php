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
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @UniqueEntity("name")
 * @UniqueEntity("nameEN")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\PostRepository")
 */
class Post
{
    use
        ContentTrait,
        InCategoryTrait,
        InModalityTrait,
        HasMediaTrait,
        InRiderTrait,
        InCircuitTrait,
        InSeasonTrait
    {
        
    }

    public function __construct()
    {
        $this->medias = new ArrayCollection();
        $this->publishedAt = new \DateTime();
    }


    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $circuitOrder;

    /**
     * @var PostMedia
     *
     * @ORM\OneToMany(targetEntity="Application\Sonata\MediaBundle\Entity\PostMedia", mappedBy="owner", cascade={"all"}, orphanRemoval=true)
     */
    private $medias;


    /**
     * @ORM\ManyToOne(targetEntity="Gallery", cascade={"persist"})
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    protected $gallery;


    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date", nullable=true)
     */
    private $publishedAt;

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
     * @return \DateTime
     */
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * @param \DateTime $publishedAt
     */
    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;
    }




    public function getfMedias() {
        if (count($this->medias))
            return $this->medias;

        return [$this->featuredMedia];
    }

    /**
     * @return mixed
     */
    public function getGallery()
    {
        return $this->gallery;
    }

    /**
     * @param mixed $gallery
     */
    public function setGallery($gallery)
    {
        $this->gallery = $gallery;
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