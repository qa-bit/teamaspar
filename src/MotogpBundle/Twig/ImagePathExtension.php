<?php

namespace MotogpBundle\Twig;

class ImagePathExtension extends \Twig_Extension
{

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('media_public_url', array($this, 'getMediaPublicUrl'))
        );
    }

    public function getMediaPublicUrl($media, string $format)
    {
        
        $provider = $this->container->get($media->getProviderName());

        return $provider->generatePublicUrl($media, $format);
    }

}