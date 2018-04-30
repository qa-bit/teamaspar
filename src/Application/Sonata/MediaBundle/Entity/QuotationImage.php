<?php


namespace Application\Sonata\MediaBundle\Entity;
use Application\Sonata\MediaBundle\Entity\MediaImage;

class QuotationImage extends MediaImage
{
    public function __construct()
    {
        parent::__construct();

        $this->context = 'quotationimage';
    }

    protected $url;

    protected $descriptionEN;

    protected $description;

    private $id;
}