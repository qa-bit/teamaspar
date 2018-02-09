<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\ContentTrait;
use MotogpBundle\Entity\Traits\InTeamCategoryTrait;

/**
 * Team
 *
 * @ORM\Table(name="team")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\TeamRepository")
 */
class Team
{
   use ContentTrait, InTeamCategoryTrait;
}

