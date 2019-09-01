<?php

namespace MotogpBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\ContentTrait;
use MotogpBundle\Entity\Traits\InCircuitTrait;
use MotogpBundle\Entity\Traits\InModalitiesTrait;
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
    use ContentTrait, InModalityTrait, InSeasonTrait, InCircuitTrait {
    }

    const LOCALES = [
        "Spanish",
        "English"
    ];

    const LOCALES_E = [
        "Español",
        "Inglés"
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
        $this->locales = [0];
        $this->modalities = new ArrayCollection();
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
     * @var array
     * @ORM\Column(type="json_array", nullable=true)
     */
    private $locales;


    /**
     * @ORM\ManyToMany(targetEntity="Modality", cascade={"persist"})
     */
    protected $modalities;



    /**
     * @param $category
     * @return $this
     */
    public function addModality($category)
    {
        if (!$this->modalities->contains($category)) {
            $this->modalities->add($category);
        }
    }


    public function removeModality($category)
    {
        $this->modalities->remove($category);
        return $this;
    }

    public function getModalities() {
        return $this->modalities;
    }

    public function setModalities($modalities) {
        $this->modalities = $modalities;
    }

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


    public function addLocale($locale) {
        $this->locales[] = $locale;
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

    /**
     * @return array
     */
    public function getLocales(): array
    {
        return $this->locales;
    }

    /**
     * @param array $locales
     */
    public function setLocales(array $locales)
    {
        $this->locales = $locales;
    }


    public function getLocalesTxt() {
        $txt = '';
        foreach ($this->getLocales() as $l) {
            $txt .= self::LOCALES_E[$l].' ';
        }

        return $txt;
    }


    public function getModalityIds() {
        $ids = [];

        foreach ($this->modalities as $m) {
            $ids[] = $m->getId();
        }

        return $ids;
    }


}
