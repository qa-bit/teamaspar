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
trait InRaceTrait {

    /**
     * @ORM\ManyToOne(targetEntity="Race", cascade={"persist"})
     */
    protected $race;

    /**
     * @return mixed
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * @param mixed $rider
     */
    public function setRace($race)
    {
        $this->race = $race;
    }
    
}