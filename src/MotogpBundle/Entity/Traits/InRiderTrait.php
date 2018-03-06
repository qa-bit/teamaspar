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
use MotogpBundle\Entity\RiderTeam;

/**
 * ContentTrait
 */
trait InRiderTrait {

    /**
     * @ORM\ManyToOne(targetEntity="Rider", cascade={"persist"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $rider;

    /**
     * @return mixed
     */
    public function getRider()
    {
        return $this->rider;
    }

    /**
     * @param mixed $rider
     */
    public function setRider($rider)
    {
        $this->rider = $rider;
    }
    
}