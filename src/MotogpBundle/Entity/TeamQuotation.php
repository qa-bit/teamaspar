<?php

namespace MotogpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MotogpBundle\Entity\Traits\ContentTrait;
use MotogpBundle\Entity\Traits\InRiderTeamTrait;
use MotogpBundle\Entity\Traits\InRiderTrait;
use MotogpBundle\Entity\Newsletter;

/**
 * TeamQuotation
 *
 * @ORM\Table(name="team_quotation")
 * @ORM\Entity(repositoryClass="MotogpBundle\Repository\TeamQuotationRepository")
 */
class TeamQuotation
{
    use ContentTrait, InRiderTrait;


    public function __construct()
    {
        $this->name = 'quotation-'.(date_format(new \DateTime(), "ymdhjis"));
    }

    /**
     * @ORM\ManyToOne(targetEntity="Newsletter", cascade={"persist"})
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    protected $newsletter;


    /**
     * @var Team
     *
     * @ORM\ManyToOne(targetEntity="MotogpBundle\Entity\Team")
     */
    private $teamMember;


    /**
     * @return int
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param int $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }

    /**
     * @return mixed
     */
    public function getNewsletter()
    {
        return $this->newsletter;
    }

    /**
     * @param mixed $newsletter
     */
    public function setNewsletter($newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * @return Team
     */
    public function getTeamMember()
    {
        return $this->teamMember;
    }

    /**
     * @param Team $teamMember
     */
    public function setTeamMember($teamMember)
    {
        $this->teamMember = $teamMember;
    }


    public function getQuoter() {
        return ($this->rider ? $this->rider : $this->teamMember);
    }

}
