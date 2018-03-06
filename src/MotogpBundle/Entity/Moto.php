<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\ContentTrait;
use MotogpBundle\Entity\Builder;

/**
 * Moto
 *
 * @ORM\Table(name="moto")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\MotoRepository")
 */
class Moto
{
    use ContentTrait;

    /**
     * @var Builder
     * @ORM\ManyToOne(targetEntity="Builder", cascade={"persist"}, inversedBy="motos")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $builder;

    /**
     * @return mixed
     */
    public function getBuilder()
    {
        return $this->builder;
    }

    /**
     * @param mixed $builder
     */
    public function setBuilder($builder)
    {
        $this->builder = $builder;
    }
}

