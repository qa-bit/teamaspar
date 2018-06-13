<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\ContentTrait;
use Doctrine\Common\Collections\ArrayCollection;
use MotogpBundle\Entity\CustomerType;
use MotogpBundle\Entity\Traits\InGroupsTrait;
use MotogpBundle\Entity\Traits\HasMediaTrait;
use MotogpBundle\Entity\TeamQuotation;
use MotogpBundle\Entity\Traits\InModalityTrait;

/**
 * Newsletter
 *
 * @ORM\Table(name="newsletter")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\NewsletterRepository")
 */
class Newsletter
{
   use ContentTrait, InGroupsTrait, HasMediaTrait, InModalityTrait;

    public function __construct()
    {
        $this->medias = new ArrayCollection();
        $this->customerTypes = new ArrayCollection();
        $this->teamQuotations = new ArrayCollection();
    }

    /**
     * @ORM\ManyToOne(targetEntity="Post", cascade={"persist"})
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    protected $post;

    /**
     * @ORM\ManyToMany(targetEntity="CustomerType", cascade={"persist"})
     */
    protected $customerTypes;


    /**
     * @ORM\OneToMany(targetEntity="TeamQuotation", cascade={"persist"}, mappedBy="newsletter", cascade={"all"}, orphanRemoval=true)
     */
    protected $teamQuotations;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $imported;


    /**
     * @var PostMedia
     * @ORM\OneToMany(targetEntity="Application\Sonata\MediaBundle\Entity\NewsLetterMedia", mappedBy="owner", cascade={"all"}, orphanRemoval=true)
     */
    private $medias;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $lastSendAt;

    /**
     * @ORM\ManyToOne(targetEntity="Gallery", cascade={"persist"})
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    protected $gallery;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $queued;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $failed;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    private $errorMessage;



    /**
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @param mixed $teamCategory
     */
    public function setPost($post)
    {
        $this->post = $post;
    }

    /**
     * @return boolean
     */
    public function isFailed()
    {
        return $this->failed;
    }

    /**
     * @param boolean $failed
     */
    public function setFailed($failed)
    {
        $this->failed = $failed;
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @param string $errorMessage
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
    }


    /**
     * Get Category
     * @return CategoryInterface
     */
    public function getCustomerType()
    {
        return $this->customerTypes;
    }

    /**
     * @param $category
     * @return $this
     */
    public function addCustomerType($customerType)
    {
        if (!$this->customerTypes->contains($customerType)) {
            $this->customerTypes->add($customerType);
        }
    }

    public function addTeamQuotation($teamQuotation)
    {

        $teamQuotation->setNewsletter($this);

        if (!$this->teamQuotations->contains($teamQuotation)) {
            $this->teamQuotations->add($teamQuotation);
        }

    }


    public function removeCustomerType($customerType)
    {
        $this->customerTypes->remove($customerType);
        return $this;
    }

    public function getCustomerTypes() {
        return $this->customerTypes;
    }

    /**
     * @return \DateTime
     */
    public function getLastSendAt()
    {
        return $this->lastSendAt;
    }

    /**
     * @param \DateTime $lastSendAt
     */
    public function setLastSendAt($lastSendAt)
    {
        $this->lastSendAt = $lastSendAt;
    }

    /**
     * @return boolean
     */
    public function isImported()
    {
        return $this->imported;
    }

    /**
     * @param boolean $imported
     */
    public function setImported($imported)
    {
        $this->imported = $imported;
    }

    /**
     * @return Media
     */
    public function getMedias()
    {
        return $this->medias;
    }


    /**
     * @return Media
     */
    public function getMedia()
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
     * @return mixed
     */
    public function getTeamQuotations()
    {
        return $this->teamQuotations;
    }

    /**
     * @param mixed $teamQuotations
     */
    public function setTeamQuotations($teamQuotations)
    {
        $this->teamQuotations = $teamQuotations;
    }

    /**
     * @return boolean
     */
    public function isQueued()
    {
        return $this->queued;
    }

    /**
     * @param boolean $queued
     */
    public function setQueued($queued)
    {
        $this->queued = $queued;
    }

    
}

