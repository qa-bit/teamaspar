<?php
/**
 * Created by PhpStorm.
 * User: egm
 * Date: 7/02/18
 * Time: 12:06
 */

namespace MotogpBundle\Entity\Traits;


use Application\Sonata\MediaBundle\Entity\FeaturedMedia;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ContentTrait
 */
trait HasHomeImageTrait {

    /**
     * @var \Application\Sonata\MediaBundle\Entity\FeaturedMedia
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\HomeImage", cascade={"persist"}, fetch="LAZY")
     */
    protected $homeImage;

    /**
     * @param MediaInterface $media
     */
    public function setHomeImage($homeImage)
    {
        $this->homeImage = $homeImage;
    }

    /**
     * @return MediaInterface
     */
    public function getHomeImage()
    {
        return $this->homeImage;
    }

}