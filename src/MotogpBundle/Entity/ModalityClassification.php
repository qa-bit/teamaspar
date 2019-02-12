<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\ContentTrait;

/**
 * TeamCategory
 *
 * @ORM\Table(name="modality_classification")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\ModalityClassificationRepository")
 */
class ModalityClassification
{
    use ContentTrait;
}

