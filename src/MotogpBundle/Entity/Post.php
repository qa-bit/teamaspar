<?php

namespace MotogpBundle\Entity;

use Application\Sonata\MediaBundle\Entity\PostMedia;
use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\ContentTrait;
use MotogpBundle\Entity\Traits\InCategoriesTrait;
use MotogpBundle\Entity\Traits\InCircuitTrait;
use MotogpBundle\Entity\Traits\InModalityTrait;
use MotogpBundle\Entity\Traits\HasMediaTrait;
use MotogpBundle\Entity\Traits\InRiderTrait;
use MotogpBundle\Entity\Traits\InSeasonTrait;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\PostRepository")
 */
class Post
{
    use
        ContentTrait,
        InCategoriesTrait,
        InModalityTrait,
        HasMediaTrait,
        InRiderTrait,
        InCircuitTrait,
        InSeasonTrait
    {
        InCategoriesTrait::__construct as inCategoriesTraitConstructor;
    }

    public function __construct()
    {
        $this->inCategoriesTraitConstructor();
        $this->medias = new ArrayCollection();
        $this->publishedAt = new \DateTime();
    }

    /**
     * @var PostMedia
     *
     * @ORM\OneToMany(targetEntity="Application\Sonata\MediaBundle\Entity\PostMedia", mappedBy="owner", cascade={"all"}, orphanRemoval=true)
     */
    private $medias;


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


    public function removeCategory($category)
    {
        $this->categories->remove($category);
        return $this;
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

}