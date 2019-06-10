<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use MotogpBundle\Entity\Traits\ContentTrait;
use MotogpBundle\Entity\Traits\HasFooterImageTrait;
use MotogpBundle\Entity\Traits\HasHeaderImageTrait;

/**
 * Modality
 *
 * @ORM\Table(name="modality")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\ModalityRepository")
 */
class Modality
{
    use ContentTrait, HasFooterImageTrait, HasHeaderImageTrait;

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
     * @ORM\Column(type="string", nullable=true)
     * @var string
     */
    private $slug;


    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $active;


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
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $showResults;


    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    private $infoEn;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    private $infoEs;


    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $showInfo;

    /**
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @return boolean
     */
    public function isShowResults()
    {
        return $this->showResults;
    }

    /**
     * @param boolean $showResults
     */
    public function setShowResults($showResults)
    {
        $this->showResults = $showResults;
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
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return boolean
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @param boolean $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

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
     * @return boolean
     */
    public function isShowInfo()
    {
        return $this->showInfo;
    }

    /**
     * @param boolean $showInfo
     */
    public function setShowInfo($showInfo)
    {
        $this->showInfo = $showInfo;
    }

    /**
     * @return string
     */
    public function getInfoEn()
    {
        return $this->infoEn;
    }

    /**
     * @param string $infoEn
     */
    public function setInfoEn($infoEn)
    {
        $this->infoEn = $infoEn;
    }

    /**
     * @return string
     */
    public function getInfoEs()
    {
        return $this->infoEs;
    }

    /**
     * @param string $infoEs
     */
    public function setInfoEs($infoEs)
    {
        $this->infoEs = $infoEs;
    }
    
}