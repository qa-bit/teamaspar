<?php

namespace Application\Sonata\MediaBundle\Entity;

use Sonata\MediaBundle\Entity\BaseMedia as BaseMedia;
use Doctrine\ORM\Mapping as ORM;


class MediaImage extends BaseMedia
{

    public function __construct()
    {
        $this->providerName   = 'sonata.media.provider.image';
        $this->providerStatus = 1;
        $this->providerReference = "reference";
        $this->providerMetadata = [];
        $this->enabled = true;
        $this->name           = 'image-'.(new \DateTime())->format('ymdms');
        $this->featured = false;
    }

    /**
     * @var int $id
     */
    protected $id;

    /**
     * @var string
     */
    protected $uploadFile;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $descriptionEN;


    /**
     * Get id.
     *
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getUploadFile()
    {
        return $this->uploadFile;
    }

    /**
     * @param string $uploadFile
     */
    public function setUploadFile($uploadFile)
    {
        $this->uploadFile = $uploadFile;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
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
     */
    public function setDescriptionEN($descriptionEN)
    {
        $this->descriptionEN = $descriptionEN;
    }

    /**
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param boolean $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

}
