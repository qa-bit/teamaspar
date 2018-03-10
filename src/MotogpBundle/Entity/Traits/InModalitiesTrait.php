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


/**
 * ContentTrait
 */
trait InModalitiesTrait {

    /**
     * @ORM\ManyToMany(targetEntity="Modality", cascade={"persist"}, orphanRemoval=true)
     */
    protected $modalities;

    public function __construct()
    {
        $this->modalities = new ArrayCollection();
    }

    /**
     * Get Modality
     * @return ModalityInterface
     */
    public function getModality()
    {
        return $this->modalities;
    }

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
}