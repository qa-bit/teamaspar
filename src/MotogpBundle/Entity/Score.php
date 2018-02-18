<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\ContentTrait;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * Score
 *
 * @ORM\Table(
 *     name="score",
 *     uniqueConstraints= {
            @ORM\UniqueConstraint(name="score_race_rider", columns={"race_id", "rider_id"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\ScoreRepository")
 */
class Score
{

    use ContentTrait;

    public function __construct()
    {
        $this->name = (new \DateTime())->format('ymd-Ms');
    }

    /**
     * @ORM\ManyToOne(targetEntity="Race", cascade={"persist"}, inversedBy="scores")
     */
    protected $race;

    /**
     * @ORM\ManyToOne(targetEntity="Rider", cascade={"persist"}, inversedBy="scores")
     */
    protected $rider;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $score;


    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $time;

    /**
     * @return mixed
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * @param mixed $race
     */
    public function setRace($race)
    {
        $this->race = $race;
    }

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

    /**
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param int $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param string $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

}

