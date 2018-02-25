<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\ContentTrait;
use MotogpBundle\Entity\Traits\InModalityTrait;

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


    
}

