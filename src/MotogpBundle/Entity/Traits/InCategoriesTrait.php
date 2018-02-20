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
use MotogpBundle\Entity\Modality;


/**
 * ContentTrait
 */
trait InCategoriesTrait {

    /**
     * @ORM\ManyToMany(targetEntity="Category", cascade={"persist"}, orphanRemoval=true)
     */
    protected $categories;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

    /**
     * Get Category
     * @return CategoryInterface
     */
    public function getCategory()
    {
        return $this->categories;
    }

    /**
     * @param $category
     * @return $this
     */
    public function addCategory($category)
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
        }
    }


    public function removeCategory($category)
    {
        $this->categories->remove($category);
        return $this;
    }

    public function getCategories() {
        return $this->categories;
    }
}