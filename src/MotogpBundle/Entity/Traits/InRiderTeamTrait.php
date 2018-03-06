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
trait InRiderTeamTrait {

    /**
     * @ORM\ManyToOne(targetEntity="RiderTeam", cascade={"persist"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $riderTeam;

    /**
     * @return mixed
     */
    public function getRiderTeam()
    {
        return $this->riderTeam;
    }

    /**
     * @param mixed $riderTeam
     */
    public function setRiderTeam($riderTeam)
    {
        $this->riderTeam = $riderTeam;
    }

}