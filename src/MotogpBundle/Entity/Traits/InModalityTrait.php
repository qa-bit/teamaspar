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
trait InModalityTrait {

    /**
     * @ORM\ManyToOne(targetEntity="Modality", cascade={"persist"})
     */
    protected $modality;

    /**
     * @return mixedInModalityTrait.php
     */
    public function getModality()
    {
        return $this->modality;
    }

    /**
     * @param mixed $modality
     */
    public function setModality(Modality $modality)
    {
        $this->modality = $modality;
    }


}