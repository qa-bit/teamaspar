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


trait InCircuitTrait {

    /**
     * @ORM\ManyToOne(targetEntity="Circuit", cascade={"persist"})
     */
    protected $circuit;

    /**
     * @return mixed
     */
    public function getCircuit()
    {
        return $this->circuit;
    }

    /**
     * @param mixed $circuit
     */
    public function setCircuit($circuit)
    {
        $this->circuit = $circuit;
    }
    
}