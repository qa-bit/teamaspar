<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\ContentTrait;

/**
 * Season
 *
 * @ORM\Table(name="season")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\SeasonRepository")
 */
class Season
{
    use ContentTrait;

    /**
     * @var string
     *
     * @ORM\Column(type="date", nullable=true)
     */
    private $start;

    /**
     * @var string
     *
     * @ORM\Column(type="date", nullable=true)
     */
    private $end;

    /**
     * @return string
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param string $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * @return string
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param string $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }
    
}

