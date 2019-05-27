<?php

namespace Application\Sonata\MediaBundle\Entity;
use Application\Sonata\MediaBundle\Entity\MediaImage;

class TeamStaffImage extends MediaImage
{
    public function __construct()
    {
        parent::__construct();

        $this->context = 'teamstaffimage';
    }

}