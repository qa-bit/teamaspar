<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\ContentTrait;
use Doctrine\Common\Collections\ArrayCollection;
use MotogpBundle\Entity\CustomerType;
use MotogpBundle\Entity\Traits\InGroupsTrait;

/**
 * Newsletter
 *
 * @ORM\Table(name="newsletter")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\NewsletterRepository")
 */
class Newsletter
{
   use ContentTrait, InGroupsTrait;

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
     * @var \DateTime
     * @ORM\Column(type="date", nullable=true)
     */
    protected $lastSendAt;

    public function __construct()
    {
        $this->customerTypes = new ArrayCollection();
    }

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

}

