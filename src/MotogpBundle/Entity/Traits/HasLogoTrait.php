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
trait HasLogoTrait {

    /**
     * @var \Application\Sonata\MediaBundle\Entity\FeaturedMedia
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Logo", cascade={"persist"}, fetch="LAZY")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $logo;

    /**
     * @param MediaInterface $media
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * @return MediaInterface
     */
    public function getLogo()
    {
        return $this->logo;
    }


}