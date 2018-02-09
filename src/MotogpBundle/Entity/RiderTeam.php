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
    use ContentTrait, InModalityTrait;
}

