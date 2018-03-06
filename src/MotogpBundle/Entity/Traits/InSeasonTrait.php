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


trait InSeasonTrait {

    /**
     * @ORM\ManyToOne(targetEntity="Season", cascade={"persist"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $season;

    /**
     * @return mixed
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * @param mixed $season
     */
    public function setSeason($season)
    {
        $this->season = $season;
    }
}