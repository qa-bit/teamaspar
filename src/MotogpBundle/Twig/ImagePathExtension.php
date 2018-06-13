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
            new \Twig_SimpleFilter('media_public_url', array($this, 'getMediaPublicUrl')),
            new \Twig_SimpleFilter('path_public_url', array($this, 'getPublicFromPath'))
        );
    }

    public function getMediaPublicUrl($media, string $format)
    {

        if ($media == null) return '';

        $provider = $this->container->get($media->getProviderName());

        return $provider->generatePublicUrl($media, $format);
    }

    public function getPublicFromPath($string) {
        $path = $this->container->get('kernel')->getProjectDir();

        $path = str_replace($path.'/web', '', $string);

        return $path;
    }

}