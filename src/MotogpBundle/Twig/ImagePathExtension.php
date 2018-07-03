<?php

namespace MotogpBundle\Twig;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;

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
            new \Twig_SimpleFilter('path_public_url', array($this, 'getPublicFromPath')),
            new \Twig_SimpleFilter('imagine_nocache_filter', array($this, 'filter'))
        );
    }


    public function filter($path, $filter, array $runtimeConfig = array(), $resolver = null)
    {
        $cacheManager = $this->container->get('liip_imagine.cache.manager');
        $cacheManager->remove($path, $filter);
        $cacheManager->resolve($path, $filter);

        return $cacheManager->getBrowserPath($path, $filter, $runtimeConfig, $resolver);
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
