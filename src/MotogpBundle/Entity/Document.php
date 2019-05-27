<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\ContentTrait;
use MotogpBundle\Entity\Traits\InCircuitTrait;
use MotogpBundle\Entity\Traits\InModalityTrait;
use MotogpBundle\Entity\Traits\InRaceTrait;
use MotogpBundle\Entity\Traits\InRiderTrait;
use MotogpBundle\Entity\Traits\InSeasonTrait;


/**
 * Document
 *
 * @ORM\Table(name="document")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\DocumentRepository")
 */
class Document
{
    use ContentTrait, InModalityTrait, InSeasonTrait, InCircuitTrait;

    const LOCALES = [
        "Spanish",
        "English"
    ];

    const LOCALES2 = [
        "ES",
        "EN"
    ];

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
        $this->publishedAt = new \DateTime();
        $this->locale = 0;
    }

    /**
     * @var
     * @ORM\ManyToOne(
     *     targetEntity="Application\Sonata\MediaBundle\Entity\Media",
     *     cascade={"persist"}
     * )
     */
    private $document;


    /**
     * @var \DateTime
     * @ORM\Column(type="date", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     * @ORM\Column(type="date", nullable=true)
     */
    private $updatedAt;

    /**
     * @var \DateTime
     * @ORM\Column(type="date", nullable=true)
     */
    private $publishedAt;


    /**
     * @var string
     * @ORM\Column(type="integer", nullable=false)
     */
    private $locale;

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }


    /**
     * @return mixed
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @param mixed $document
     */
    public function setDocument($document)
    {
        $this->document = $document;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }


    public function getLocale2() {
        return self::LOCALES2[$this->locale];
    }

    public function getDocumentUrl() {

        if ($this->getDocument()) {
            return '/media/download/'.$this->document->getId();
        }

        return "";
    }

    public function getPublishedAt() {
        return $this->createdAt;
    }
    
    


}
