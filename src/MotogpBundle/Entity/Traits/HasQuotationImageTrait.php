<?php
namespace MotogpBundle\Entity\Traits;

use Application\Sonata\MediaBundle\Entity\FeaturedMedia;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;

trait HasQuotationImageTrait {

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\QuotationImage", cascade={"persist"}, fetch="LAZY")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $quotationImage;

    /**
     * @param MediaInterface $media
     */
    public function setQuotationImage($quotationImage)
    {
        $this->quotationImage = $quotationImage;
    }

    /**
     * @return MediaInterface
     */
    public function getQuotationImage()
    {
        return $this->quotationImage;
    }


}