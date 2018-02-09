<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\ContentTrait;

/**
 * TeamCategory
 *
 * @ORM\Table(name="team_category")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\TeamCategoryRepository")
 */
class TeamCategory
{
    use ContentTrait;
}

