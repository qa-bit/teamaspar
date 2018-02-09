<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\ContentTrait;
use MotogpBundle\Entity\Traits\HasMediaTrait;

/**
 * Circuit
 *
 * @ORM\Table(name="circuit")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\CircuitRepository")
 */
class Circuit
{
    use ContentTrait, HasMediaTrait;
}