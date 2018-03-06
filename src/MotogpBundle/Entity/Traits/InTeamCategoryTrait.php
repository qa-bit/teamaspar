<?php
/**
 * Created by PhpStorm.
 * User: egm
 * Date: 7/02/18
 * Time: 12:06
 */

namespace MotogpBundle\Entity\Traits;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use MotogpBundle\Entity\TeamCategory;

/**
 * ContentTrait
 */
trait InTeamCategoryTrait {

    /**
     * @ORM\ManyToOne(targetEntity="TeamCategory", cascade={"persist"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $teamCategory;

    /**
     * @return mixed
     */
    public function getTeamCategory()
    {
        return $this->teamCategory;
    }

    /**
     * @param mixed $teamCategory
     */
    public function setTeamCategory($teamCategory)
    {
        $this->teamCategory = $teamCategory;
    }


}