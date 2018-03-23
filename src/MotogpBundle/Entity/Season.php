<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\ContentTrait;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Season
 *
 * @ORM\Table(name="season")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\SeasonRepository")
 */
class Season
{
    use ContentTrait;

    public function __construct()
    {
        $this->circuits = new ArrayCollection();
        $this->races = new ArrayCollection();
    }

    /**
     * @var string
     *
     * @ORM\Column(type="date", nullable=true)
     */
    private $start;

    /**
     * @var string
     *
     * @ORM\Column(type="date", nullable=true)
     */
    private $end;


    /**
     * @ORM\ManyToMany(targetEntity="Circuit", cascade={"persist"}, orphanRemoval=true)
     */
    protected $circuits;


    /**
     * @ORM\OneToMany(targetEntity="Race", mappedBy="season", cascade={"persist"}, orphanRemoval=true)
     */
    protected $races;


    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $current;

    /**
     * @return string
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param string $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * @return string
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param string $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }
    
    /**
     * Get Circuit
     * @return CircuitInterface
     */
    public function getCategory()
    {
        return $this->circuits;
    }

    /**
     * @param $circuit
     * @return $this
     */
    public function addCircuit($circuit)
    {
        if (!$this->circuits->contains($circuit)) {
            $this->circuits->add($circuit);
        }
    }


    public function removeCircuit($circuit)
    {
        $this->circuit->remove($circuit);
        return $this;
    }

    public function getCircuits() {
        return $this->circuits;
    }

    /**
     * @return mixed
     */
    public function getRaces()
    {
        return $this->races;
    }

    /**
     * @param mixed $races
     */
    public function setRaces($races)
    {
        $this->races = $races;
    }


    /**
     * @param $circuit
     * @return $this
     */
    public function addRace($race)
    {
        if (!$this->races->contains($race)) {
            $race->setSeason($this);
            $this->races->add($race);
        }
    }


    public function removeRace($race)
    {
        $this->races->remove($race);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCurrent()
    {
        return $this->current;
    }

    /**
     * @param mixed $current
     */
    public function setCurrent($current)
    {
        $this->current = $current;
    }



}

