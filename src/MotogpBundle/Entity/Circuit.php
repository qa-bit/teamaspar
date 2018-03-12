<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\ContentTrait;
use MotogpBundle\Entity\Traits\HasMediaGalleryTrait;
use MotogpBundle\Entity\Traits\HasMediaTrait;
use MotogpBundle\Entity\Gallery;

/**
 * Circuit
 *
 * @ORM\Table(name="circuit")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\CircuitRepository")
 */
class Circuit
{
    use ContentTrait, HasMediaTrait, HasMediaGalleryTrait;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=false)
     */
    private $subtitle;


    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=false)
     */
    private $subtitleEN;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=false)
     */
    private $country;


    /**
     * @var Gallery
     *
     * @ORM\OneToMany(targetEntity="MotogpBundle\Entity\Gallery", mappedBy="circuit", cascade={"all"}, orphanRemoval=true)
     * @ORM\OrderBy({"_order" = "ASC"})*
     */
    private $galleries;


    /**
     * @var Gallery
     *
     * @ORM\OneToMany(targetEntity="MotogpBundle\Entity\Post", mappedBy="circuit", cascade={"all"}, orphanRemoval=true)
     * @ORM\OrderBy({"publishedAt" = "DESC"})
     */
    private $posts;

    /**
     * @return string
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * @param string $subtitle
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return \MotogpBundle\Entity\Gallery
     */
    public function getGalleries()
    {
        return $this->galleries;
    }

    /**
     * @param \MotogpBundle\Entity\Gallery $galleries
     */
    public function setGalleries($galleries)
    {
        $this->galleries = $galleries;
    }

    /**
     * @param $category
     * @return $this
     */
    public function addGallery($gallery)
    {
        if (!$this->galleries->contains($gallery)) {
            $gallery->setGallery($this);
            $this->galleries->add($gallery);
        }
    }

    /**
     * @param $category
     * @return $this
     */
    public function addPost($post)
    {
        if (!$this->posts->contains($post)) {
            $post->setCircuit($this);
            $this->posts->add($post);
        }
    }

    /**
     * @return \MotogpBundle\Entity\Gallery
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * @param \MotogpBundle\Entity\Gallery $posts
     */
    public function setPosts($posts)
    {
        $this->posts = $posts;
    }

    /**
     * @return string
     */
    public function getSubtitleEN()
    {
        return $this->subtitleEN;
    }

    /**
     * @param string $subtitleEN
     */
    public function setSubtitleEN($subtitleEN)
    {
        $this->subtitleEN = $subtitleEN;
    }
    
    
}