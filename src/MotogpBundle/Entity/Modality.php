<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use MotogpBundle\Entity\Traits\ContentTrait;

/**
 * Modality
 *
 * @ORM\Table(name="modality")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\ModalityRepository")
 */
class Modality
{
    use ContentTrait;
}