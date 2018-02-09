<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\ContentTrait;
use MotogpBundle\Entity\Traits\HasMediaTrait;


/**
 * Builder
 *
 * @ORM\Table(name="builder")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\BuilderRepository")
 */
class Builder
{
    use ContentTrait, HasMediaTrait;
}

