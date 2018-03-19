<?php
/**
 * Created by PhpStorm.
 * User: egm
 * Date: 7/02/18
 * Time: 12:06
 */

namespace MotogpBundle\Entity\Traits;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * ContentTrait
 */
trait ContentTrait {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    
    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=false)
     */
    private $name;


    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Groups({"context"})
     */
    private $nameEN;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"context"})
     */
    private $description;


    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptionEN;


    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $seoTitle;


    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $seoTitleEN;


    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $seoKeywords;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $seoKeywordsEN;


    /**
     * @var string
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $_order;


    /**
     * @var DateTime
     *
     * @ORM\Column(type="date", nullable=true)
     */
    private $createdAt;

    /**
     * @var DateTime
     *
     * @ORM\Column(type="date", nullable=true)
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $slug;


    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $slugEN;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ContentTrait
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ContentTrait
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getNameEN()
    {
        return $this->nameEN;
    }

    /**
     * @param string $nameEN
     * @return ContentTrait
     */
    public function setNameEN($nameEN)
    {
        $this->nameEN = $nameEN;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return ContentTrait
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescriptionEN()
    {
        return $this->descriptionEN;
    }

    /**
     * @param string $descriptionEN
     * @return ContentTrait
     */
    public function setDescriptionEN($descriptionEN)
    {
        $this->descriptionEN = $descriptionEN;
        return $this;
    }

    /**
     * @return string
     */
    public function getSeoTitle()
    {
        return $this->seoTitle;
    }

    /**
     * @param string $seoTitle
     * @return ContentTrait
     */
    public function setSeoTitle($seoTitle)
    {
        $this->seoTitle = $seoTitle;
        return $this;
    }

    /**
     * @return string
     */
    public function getSeoTitleEN()
    {
        return $this->seoTitleEN;
    }

    /**
     * @param string $seoTitleEN
     * @return ContentTrait
     */
    public function setSeoTitleEN($seoTitleEN)
    {
        $this->seoTitleEN = $seoTitleEN;
        return $this;
    }

    /**
     * @return string
     */
    public function getSeoKeywords()
    {
        return $this->seoKeywords;
    }

    /**
     * @param string $seoKeywords
     * @return ContentTrait
     */
    public function setSeoKeywords($seoKeywords)
    {
        $this->seoKeywords = $seoKeywords;
        return $this;
    }

    /**
     * @return string
     */
    public function getSeoKeywordsEN()
    {
        return $this->seoKeywordsEN;
    }

    /**
     * @param string $seoKeywordsEN
     * @return ContentTrait
     */
    public function setSeoKeywordsEN($seoKeywordsEN)
    {
        $this->seoKeywordsEN = $seoKeywordsEN;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrder()
    {
        return $this->_order;
    }

    /**
     * @param string $order
     * @return ContentTrait
     */
    public function setOrder($order)
    {
        $this->_order = $order;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     * @return ContentTrait
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param string $updatedAt
     * @return ContentTrait
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
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

    
    public function __toString()
    {
       return $this->name ?? (string) null;
    }

    /**
     * @return string
     */
    public function getSlugEN()
    {
        return $this->slugEN;
    }

    /**
     * @param string $slugEN
     */
    public function setSlugEN($slugEN)
    {
        $this->slugEN = $slugEN;
    }
    
}