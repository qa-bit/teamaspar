<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\ContentTrait;
use Doctrine\ORM\Mapping\UniqueConstraint;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Score
 *
 * @ORM\Table(
 *     name="score"
 * )
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\ScoreRepository")
 * @UniqueEntity(
 *     fields={"rider", "race"},
 *     errorPath="rider",
 *     message="name_in_use"
 * )
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
     * @ORM\JoinColumn(onDelete="CASCADE")*
     */
    protected $race;

    /**
     * @ORM\ManyToOne(targetEntity="Rider", cascade={"persist"}, inversedBy="scores")
     * @ORM\JoinColumn(onDelete="CASCADE")*
     */
    protected $rider;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $score;


    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $timeMinutes;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     */

    protected $timeSeconds;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $timeMilliSeconds;


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
     * @return int
     */
    public function getTimeMinutes()
    {
        return $this->timeMinutes;
    }

    /**
     * @param int $timeMinutes
     */
    public function setTimeMinutes($timeMinutes)
    {
        $this->timeMinutes = $timeMinutes;
    }

    /**
     * @return int
     */
    public function getTimeSeconds()
    {
        return $this->timeSeconds;
    }

    /**
     * @param int $timeSeconds
     */
    public function setTimeSeconds($timeSeconds)
    {
        $this->timeSeconds = $timeSeconds;
    }

    /**
     * @return int
     */
    public function getTimeMilliseconds()
    {
        return $this->timeMilliSeconds;
    }

    /**
     * @param int $timeMilliseconds
     */
    public function setTimeMilliSeconds($timeMilliSeconds)
    {
        $this->timeMilliSeconds = $timeMilliSeconds;
    }

}

