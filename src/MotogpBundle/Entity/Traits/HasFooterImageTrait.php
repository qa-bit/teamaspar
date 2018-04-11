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
trait HasFooterImageTrait {

    /**
     * @var \Application\Sonata\MediaBundle\Entity\FeaturedMedia
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\FooterImage", cascade={"persist"}, fetch="LAZY")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $footerImage;

    /**
     * @param MediaInterface $media
     */
    public function setFooterImage($footerImage)
    {
        $this->footerImage = $footerImage;
    }

    /**
     * @return MediaInterface
     */
    public function getFooterImage()
    {
        return $this->footerImage;
    }


}