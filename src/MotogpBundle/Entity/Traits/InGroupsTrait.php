<?php
/**
 * Created by PhpStorm.
 * User: egm
 * Date: 7/02/18
 * Time: 12:06
 */

namespace MotogpBundle\Entity\Traits;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use MotogpBundle\Entity\Modality;


/**
 * ContentTrait
 */
trait InGroupsTrait {

    /**
     * @ORM\ManyToMany(targetEntity="CustomerGroup", cascade={"persist"})
     * @ORM\JoinColumn(onDelete="SET NULL")*
     */
    protected $groups;

    public function __construct()
    {
        $this->groups = new ArrayCollection();
    }

    /**
     * Get Category
     * @return CategoryInterface
     */
    public function getGroup()
    {
        return $this->groups;
    }

    /**
     * @param $group
     * @return $this
     */
    public function addGroup($group)
    {
        if (!$this->groups->contains($group)) {
            $this->groups->add($group);
        }
    }


    public function removeGroup($group)
    {
        $this->groups->remove($group);
        return $this;
    }

    public function getGroups() {
        return $this->groups;
    }
}