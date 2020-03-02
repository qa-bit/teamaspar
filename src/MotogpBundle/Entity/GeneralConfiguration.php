<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\IdTrait;

/**
 * GeneralConfiguration
 *
 * @ORM\Table(name="general_configuration")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\GeneralConfigurationRepository")
 */
class GeneralConfiguration
{
    use IdTrait;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $worldTitles;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $worldSubChampionships;


    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $wins;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $podiums;


    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $showResults;

    /**
     * @return int
     */
    public function getWorldTitles()
    {
        return $this->worldTitles;
    }

    /**
     * @param int $worldTitles
     */
    public function setWorldTitles($worldTitles)
    {
        $this->worldTitles = $worldTitles;
    }

    /**
     * @return int
     */
    public function getWorldSubChampionships()
    {
        return $this->worldSubChampionships;
    }

    /**
     * @param int $worldSubChampionships
     */
    public function setWorldSubChampionships($worldSubChampionships)
    {
        $this->worldSubChampionships = $worldSubChampionships;
    }

    /**
     * @return int
     */
    public function getWins()
    {
        return $this->wins;
    }

    /**
     * @param int $wins
     */
    public function setWins($wins)
    {
        $this->wins = $wins;
    }

    /**
     * @return int
     */
    public function getPodiums()
    {
        return $this->podiums;
    }

    /**
     * @param int $podiums
     */
    public function setPodiums($podiums)
    {
        $this->podiums = $podiums;
    }

    /**
     * @return bool
     */
    public function isShowResults()
    {
        return $this->showResults;
    }

    /**
     * @param bool $showResults
     */
    public function setShowResults($showResults)
    {
        $this->showResults = $showResults;
    }


}
