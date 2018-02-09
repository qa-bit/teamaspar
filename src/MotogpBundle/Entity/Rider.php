<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\ContentTrait;
use MotogpBundle\Entity\Traits\InModalityTrait;
use MotogpBundle\Entity\Traits\InRiderTeamTrait;
use MotogpBundle\Entity\Traits\InTeamCategoryTrait;

/**
 * Rider
 *
 * @ORM\Table(name="rider")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\RiderRepository")
 */
class Rider
{
   use ContentTrait, InModalityTrait, InTeamCategoryTrait, InRiderTeamTrait;

   /**
    * @var string
    *
    * @ORM\Column(type="string", nullable=false)
    */
   private $surname;

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
   
}

