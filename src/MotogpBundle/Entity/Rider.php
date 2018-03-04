<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\ContentTrait;
use MotogpBundle\Entity\Traits\HasMediaTrait;
use MotogpBundle\Entity\Traits\InModalityTrait;
use MotogpBundle\Entity\Traits\InRiderTeamTrait;
use MotogpBundle\Entity\Traits\InTeamCategoryTrait;
use MotogpBundle\Entity\Traits\InMotoTrait;
use MotogpBundle\Entity\Traits\HasLogoTrait;
use MotogpBundle\Entity\Traits\HasHomeImageTrait;

/**
 * Rider
 *
 * @ORM\Table(name="rider")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\RiderRepository")
 */
class Rider
{
   use
       ContentTrait,
       InModalityTrait,
       InTeamCategoryTrait,
       InRiderTeamTrait,
       HasMediaTrait,
       HasLogoTrait,
       HasHomeImageTrait,
       InMotoTrait;


   public function __construct()
   {
      $this->showInHome = false;
   }

   /**
    * @var string
    *
    * @ORM\Column(type="string", nullable=false)
    */
   private $surname;

   /**
    * @var string
    *
    * @ORM\Column(type="date", nullable=true)
    */
   private $birthDate;

   /**
    * @var string
    *
    * @ORM\Column(type="string", nullable=true)
    */
   private $birthPlace;
   
   /**
    * @var string
    *
    * @ORM\Column(type="string", nullable=false)
    */
   private $country;


   /**
    * @var string
    *
    * @ORM\Column(type="string", nullable=true)
    */
   private $firstRace;


   /**
    * @var string
    *
    * @ORM\Column(type="string", nullable=true)
    */
   private $firstGrandPrix;


   /**
    * @var string
    *
    * @ORM\Column(type="string", nullable=true)
    */
   private $firstVictory;


   /**
    * @var string
    *
    * @ORM\Column(type="string", nullable=true)
    */
   private $lastVictory;


   /**
    * @var string
    *
    * @ORM\Column(type="string", nullable=true)
    */
   private $firstPole;


   /**
    * @var string
    *
    * @ORM\Column(type="string", nullable=true)
    */
   private $firstFastLap;


   /**
    * @var string
    *
    * @ORM\Column(type="string", nullable=true)
    */
   private $firstPodium;


   /**
    * @var string
    *
    * @ORM\Column(type="string", nullable=true)
    */
   private $victorys;


   /**
    * @var string
    *
    * @ORM\Column(type="string", nullable=true)
    */
   private $poles;

   /**
    * @var string
    *
    * @ORM\Column(type="string", nullable=true)
    */
   private $fastLaps;

   /**
    * @var string
    *
    * @ORM\Column(type="string", nullable=true)
    */
   private $bestGeneralResult;


   /**
    * @var string
    *
    * @ORM\Column(type="string", nullable=true)
    */
   private $gpss;


   /**
    * @var string
    * @ORM\Column(type="string", nullable=true)
    */
   private $victoryList;


   /**
    * @var string
    *
    * @ORM\Column(type="string", nullable=true)
    */
   private $firstRaceEN;


   /**
    * @var string
    *
    * @ORM\Column(type="string", nullable=true)
    */
   private $firstGrandPrixEN;


   /**
    * @var string
    *
    * @ORM\Column(type="string", nullable=true)
    */
   private $firstVictoryEN;


   /**
    * @var string
    *
    * @ORM\Column(type="string", nullable=true)
    */
   private $lastVictoryEN;


   /**
    * @var string
    *
    * @ORM\Column(type="string", nullable=true)
    */
   private $firstPoleEN;


   /**
    * @var string
    *
    * @ORM\Column(type="string", nullable=true)
    */
   private $firstFastLapEN;


   /**
    * @var string
    *
    * @ORM\Column(type="string", nullable=true)
    */
   private $firstPodiumEN;


   /**
    * @var string
    *
    * @ORM\Column(type="string", nullable=true)
    */
   private $victorysEN;


   /**
    * @var string
    *
    * @ORM\Column(type="string", nullable=true)
    */
   private $polesEN;

   /**
    * @var string
    *
    * @ORM\Column(type="string", nullable=true)
    */
   private $fastLapsEN;

   /**
    * @var string
    *
    * @ORM\Column(type="string", nullable=true)
    */
   private $bestGeneralResultEN;


   /**
    * @var string
    *
    * @ORM\Column(type="string", nullable=true)
    */
   private $gpssEN;


   /**
    * @var string
    * @ORM\Column(type="string", nullable=true)
    */
   private $victoryListEN;



   /**
    * @ORM\OneToMany(targetEntity="Score", cascade={"persist"}, mappedBy="rider")
    */
   protected $scores;


   /**
    * @var boolean
    * @ORM\Column(type="boolean", nullable=true)
    */
   protected $external;


   /**
    * @var boolean
    * @ORM\Column(type="boolean", nullable=true)
    */
   protected $showInHome;

   /**
    * @return string
    */
   public function getSurname()
   {
      return $this->surname;
   }

   /**
    * @param string $surname
    */
   public function setSurname($surname)
   {
      $this->surname = $surname;
   }

   /**
    * @return string
    */
   public function getBirthDate()
   {
      return $this->birthDate;
   }

   /**
    * @param string $birthDate
    */
   public function setBirthDate($birthDate)
   {
      $this->birthDate = $birthDate;
   }

   /**
    * @return string
    */
   public function getBirthPlace()
   {
      return $this->birthPlace;
   }

   /**
    * @param string $birthPlace
    */
   public function setBirthPlace($birthPlace)
   {
      $this->birthPlace = $birthPlace;
   }

   /**
    * @return string
    */
   public function getFirstRace()
   {
      return $this->firstRace;
   }

   /**
    * @param string $firstRace
    */
   public function setFirstRace($firstRace)
   {
      $this->firstRace = $firstRace;
   }

   /**
    * @return string
    */
   public function getFirstGrandPrix()
   {
      return $this->firstGrandPrix;
   }

   /**
    * @param string $firstGrandPrix
    */
   public function setFirstGrandPrix($firstGrandPrix)
   {
      $this->firstGrandPrix = $firstGrandPrix;
   }

   /**
    * @return string
    */
   public function getFirstVictory()
   {
      return $this->firstVictory;
   }

   /**
    * @param string $firstVictory
    */
   public function setFirstVictory($firstVictory)
   {
      $this->firstVictory = $firstVictory;
   }

   /**
    * @return string
    */
   public function getLastVictory()
   {
      return $this->lastVictory;
   }

   /**
    * @param string $lastVictory
    */
   public function setLastVictory($lastVictory)
   {
      $this->lastVictory = $lastVictory;
   }

   /**
    * @return string
    */
   public function getFirstPole()
   {
      return $this->firstPole;
   }

   /**
    * @param string $firstPole
    */
   public function setFirstPole($firstPole)
   {
      $this->firstPole = $firstPole;
   }

   /**
    * @return string
    */
   public function getFirstFastLap()
   {
      return $this->firstFastLap;
   }

   /**
    * @param string $firstFastLap
    */
   public function setFirstFastLap($firstFastLap)
   {
      $this->firstFastLap = $firstFastLap;
   }

   /**
    * @return string
    */
   public function getFirstPodium()
   {
      return $this->firstPodium;
   }

   /**
    * @param string $firstPodium
    */
   public function setFirstPodium($firstPodium)
   {
      $this->firstPodium = $firstPodium;
   }

   /**
    * @return string
    */
   public function getVictorys()
   {
      return $this->victorys;
   }

   /**
    * @param string $victorys
    */
   public function setVictorys($victorys)
   {
      $this->victorys = $victorys;
   }

   /**
    * @return string
    */
   public function getPoles()
   {
      return $this->poles;
   }

   /**
    * @param string $poles
    */
   public function setPoles($poles)
   {
      $this->poles = $poles;
   }

   /**
    * @return string
    */
   public function getFastLaps()
   {
      return $this->fastLaps;
   }

   /**
    * @param string $fastLaps
    */
   public function setFastLaps($fastLaps)
   {
      $this->fastLaps = $fastLaps;
   }

   /**
    * @return string
    */
   public function getBestGeneralResult()
   {
      return $this->bestGeneralResult;
   }

   /**
    * @param string $bestGeneralResult
    */
   public function setBestGeneralResult($bestGeneralResult)
   {
      $this->bestGeneralResult = $bestGeneralResult;
   }

   /**
    * @return string
    */
   public function getGpss()
   {
      return $this->gpss;
   }

   /**
    * @param string $gpss
    */
   public function setGpss($gpss)
   {
      $this->gpss = $gpss;
   }

   /**
    * @return string
    */
   public function getVictoryList()
   {
      return $this->victoryList;
   }

   /**
    * @param string $victoryList
    */
   public function setVictoryList($victoryList)
   {
      $this->victoryList = $victoryList;
   }

   /**
    * @return string
    */
   public function getFirstRaceEN()
   {
      return $this->firstRaceEN;
   }

   /**
    * @param string $firstRaceEN
    */
   public function setFirstRaceEN($firstRaceEN)
   {
      $this->firstRaceEN = $firstRaceEN;
   }

   /**
    * @return string
    */
   public function getFirstGrandPrixEN()
   {
      return $this->firstGrandPrixEN;
   }

   /**
    * @param string $firstGrandPrixEN
    */
   public function setFirstGrandPrixEN($firstGrandPrixEN)
   {
      $this->firstGrandPrixEN = $firstGrandPrixEN;
   }

   /**
    * @return string
    */
   public function getFirstVictoryEN()
   {
      return $this->firstVictoryEN;
   }

   /**
    * @param string $firstVictoryEN
    */
   public function setFirstVictoryEN($firstVictoryEN)
   {
      $this->firstVictoryEN = $firstVictoryEN;
   }

   /**
    * @return string
    */
   public function getLastVictoryEN()
   {
      return $this->lastVictoryEN;
   }

   /**
    * @param string $lastVictoryEN
    */
   public function setLastVictoryEN($lastVictoryEN)
   {
      $this->lastVictoryEN = $lastVictoryEN;
   }

   /**
    * @return string
    */
   public function getFirstPoleEN()
   {
      return $this->firstPoleEN;
   }

   /**
    * @param string $firstPoleEN
    */
   public function setFirstPoleEN($firstPoleEN)
   {
      $this->firstPoleEN = $firstPoleEN;
   }

   /**
    * @return string
    */
   public function getFirstFastLapEN()
   {
      return $this->firstFastLapEN;
   }

   /**
    * @param string $firstFastLapEN
    */
   public function setFirstFastLapEN($firstFastLapEN)
   {
      $this->firstFastLapEN = $firstFastLapEN;
   }

   /**
    * @return string
    */
   public function getFirstPodiumEN()
   {
      return $this->firstPodiumEN;
   }

   /**
    * @param string $firstPodiumEN
    */
   public function setFirstPodiumEN($firstPodiumEN)
   {
      $this->firstPodiumEN = $firstPodiumEN;
   }

   /**
    * @return string
    */
   public function getVictorysEN()
   {
      return $this->victorysEN;
   }

   /**
    * @param string $victorysEN
    */
   public function setVictorysEN($victorysEN)
   {
      $this->victorysEN = $victorysEN;
   }

   /**
    * @return string
    */
   public function getPolesEN()
   {
      return $this->polesEN;
   }

   /**
    * @param string $polesEN
    */
   public function setPolesEN($polesEN)
   {
      $this->polesEN = $polesEN;
   }

   /**
    * @return string
    */
   public function getFastLapsEN()
   {
      return $this->fastLapsEN;
   }

   /**
    * @param string $fastLapsEN
    */
   public function setFastLapsEN($fastLapsEN)
   {
      $this->fastLapsEN = $fastLapsEN;
   }

   /**
    * @return string
    */
   public function getBestGeneralResultEN()
   {
      return $this->bestGeneralResultEN;
   }

   /**
    * @param string $bestGeneralResultEN
    */
   public function setBestGeneralResultEN($bestGeneralResultEN)
   {
      $this->bestGeneralResultEN = $bestGeneralResultEN;
   }

   /**
    * @return string
    */
   public function getGpssEN()
   {
      return $this->gpssEN;
   }

   /**
    * @param string $gpssEN
    */
   public function setGpssEN($gpssEN)
   {
      $this->gpssEN = $gpssEN;
   }

   /**
    * @return string
    */
   public function getVictoryListEN()
   {
      return $this->victoryListEN;
   }

   /**
    * @param string $victoryListEN
    */
   public function setVictoryListEN($victoryListEN)
   {
      $this->victoryListEN = $victoryListEN;
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
    * @return boolean
    */
   public function isExternal()
   {
      return $this->external;
   }

   /**
    * @param boolean $external
    */
   public function setExternal($external)
   {
      $this->external = $external;
   }

   /**
    * @return string
    */
   public function getCountry()
   {
      return $this->country;
   }

   /**
    * @param string $country
    */
   public function setCountry($country)
   {
      $this->country = $country;
   }

   /**
    * @return boolean
    */
   public function isShowInHome()
   {
      return $this->showInHome;
   }

   /**
    * @param boolean $showInHome
    */
   public function setShowInHome($showInHome)
   {
      $this->showInHome = $showInHome;
   }
   


}

