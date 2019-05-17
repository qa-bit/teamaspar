<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Rider;

/**
 * RiderChampionship
 *
 * @ORM\Table(name="rider_championship")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\RiderChampionshipRepository")
 */
class RiderChampionship
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $year;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $description;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $descriptionEN;

    /**
     * @ORM\ManyToOne(targetEntity="Rider", cascade={"persist"}, inversedBy="records")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $rider;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param string $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescriptionEN()
    {
        return $this->descriptionEN;
    }

    /**
     * @param string $descriptionEN
     */
    public function setDescriptionEN($descriptionEN)
    {
        $this->descriptionEN = $descriptionEN;
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

}
