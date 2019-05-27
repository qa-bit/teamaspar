<?php
namespace MotogpBundle\Entity\Traits;

use Application\Sonata\MediaBundle\Entity\FeaturedMedia;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;

trait HasTeamStaffImageTrait {

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\TeamStaffImage", cascade={"persist"}, fetch="LAZY")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $teamStaffImage;

    /**
     * @param MediaInterface $media
     */
    public function setTeamStaffImage($teamStaffImage)
    {
        $this->teamStaffImage = $teamStaffImage;
    }

    /**
     * @return MediaInterface
     */
    public function getTeamStaffImage()
    {
        return $this->teamStaffImage;
    }


}