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
use MotogpBundle\Entity\Moto;

/**
 * ContentTrait
 */
trait InMotoTrait {

    /**
     * @ORM\ManyToOne(targetEntity="Moto", cascade={"persist"})
     */
    protected $moto;

    /**
     * @return mixed
     */
    public function getMoto()
    {
        return $this->moto;
    }

    /**
     * @param mixed $moto
     */
    public function setMoto($moto)
    {
        $this->moto = $moto;
    }
    
}