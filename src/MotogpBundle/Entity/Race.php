<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\ContentTrait;
use MotogpBundle\Entity\Traits\InCircuitTrait;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Race
 *
 * @ORM\Table(name="race")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\RaceRepository")
 */
class Race
{
    use ContentTrait, InCircuitTrait;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date", nullable=true)
     */
    private $start;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date", nullable=true)
     */
    private $end;

    /**
     * @ORM\ManyToOne(targetEntity="Season", cascade={"persist"}, inversedBy="races")
     */
    protected $season;


    /**
     * @ORM\OneToMany(targetEntity="Score", cascade={"persist"}, mappedBy="race")
     */
    protected $scores;


    public function __construct()
    {
        $this->scores = new ArrayCollection();
    }


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


    /**
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param \DateTime $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param \DateTime $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * @return mixed
     */
    public function getScores()
    {
        return $this->scores;
    }

    /**
     * @param mixed $scores
     */
    public function setScores($scores)
    {
        $this->scores = $scores;
    }


    /**
     * @param $score
     * @return $this
     */
    public function addScore($score)
    {
        if ( $this->scores !== null && !$this->scores->contains($score) ) {
            $score->setRace($this);
            $this->scores->add($score);
        }
    }


    public function removeCategory($score)
    {
        $this->scores->remove($score);
        return $this;
    }

}

