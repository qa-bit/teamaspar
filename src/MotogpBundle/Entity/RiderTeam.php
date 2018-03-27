<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\ContentTrait;
use MotogpBundle\Entity\Traits\InModalityTrait;
use MotogpBundle\Entity\Rider;

/**
 * RiderTeam
 *
 * @ORM\Table(name="rider_team")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\RiderTeamRepository")
 */
class RiderTeam
{
    use ContentTrait;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $main;


    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $facebook;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $twitter;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $instagram;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $youtube;

    /**
     * @var Team
     *
     * @ORM\OneToMany(targetEntity="MotogpBundle\Entity\Team", mappedBy="riderTeam", cascade={"all"}, orphanRemoval=true)
     */
    private $staffMembers;

    /**
     * @var Team
     *
     * @ORM\OneToMany(targetEntity="MotogpBundle\Entity\Rider", mappedBy="riderTeam", cascade={"persist"}, orphanRemoval=true)
     */
    private $riders;

    /**
     * @return boolean
     */
    public function isMain()
    {
        return $this->main;
    }

    /**
     * @param boolean $main
     */
    public function setMain($main)
    {
        $this->main = $main;
    }

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $history;


    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $historyEN;

    /**
     * @return string
     */
    public function getHistory()
    {
        return $this->history;
    }

    /**
     * @param string $history
     */
    public function setHistory($history)
    {
        $this->history = $history;
    }

    /**
     * @return string
     */
    public function getHistoryEN()
    {
        return $this->historyEN;
    }

    /**
     * @param string $historyEN
     */
    public function setHistoryEN($historyEN)
    {
        $this->historyEN = $historyEN;
    }

    /**
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @param string $facebook
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * @param string $twitter
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;
    }

    /**
     * @return string
     */
    public function getInstagram()
    {
        return $this->instagram;
    }

    /**
     * @param string $instagram
     */
    public function setInstagram($instagram)
    {
        $this->instagram = $instagram;
    }

    /**
     * @return string
     */
    public function getYoutube()
    {
        return $this->youtube;
    }

    /**
     * @param string $youtube
     */
    public function setYoutube($youtube)
    {
        $this->youtube = $youtube;
    }

    /**
     * @param $team
     * @return $this
     */
    public function addStaffMember($team)
    {
        if (!$this->staffMembers->contains($team)) {
            $team->setRiderTeam($this);
            $this->staffMembers->add($team);
        }
    }


    /**
     * @param $team
     * @return $this
     */
    public function addRider($rider)
    {
        if (!$this->riders->contains($rider)) {
            $rider->setRiderTeam($this);
            $this->riders->add($rider);
        }
    }

    /**
     * @return Team
     */
    public function getStaffMembers()
    {
        return $this->staffMembers;
    }


    /**
     * @return Team
     */
    public function getRiders()
    {
        return $this->riders;
    }

    /**
     * @param Team $staffMembers
     */
    public function setStaffMembers($staffMembers)
    {
        $this->staffMembers = $staffMembers;
    }

    public function getTeamMoto($modality) {

        if (!$this->main) {
            if (count($this->riders))
                return $this->riders[0]->getMoto();
        } else {
            $moto = null;

            foreach ($this->getRiders() as $rider) {
                if ($rider->getModality()->getSlug() == $modality) {
                    $moto = $rider->getMoto();
                }
            }

            return $moto;
        }

        return null;
    }
    
}

