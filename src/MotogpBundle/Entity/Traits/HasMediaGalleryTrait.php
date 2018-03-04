<?php
/**
 * Created by PhpStorm.
 * User: egm
 * Date: 7/02/18
 * Time: 12:06
 */

namespace MotogpBundle\Entity\Traits;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use MotogpBundle\Entity\Modality;
use Application\Sonata\MediaBundle\Entity\Media;

/**
 * ContentTrait
 */
trait HasMediaGalleryTrait {

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Gallery", mappedBy="",cascade={"persist"})
     */
    private $gallery;

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

}