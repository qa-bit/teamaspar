<?php

namespace MotogpBundle\Command;

use Application\Sonata\MediaBundle\Entity\FeaturedMedia;
use Application\Sonata\MediaBundle\Entity\FooterImage;
use Application\Sonata\MediaBundle\Entity\GalleryMedia;
use Application\Sonata\MediaBundle\Entity\HeaderImage;
use Application\Sonata\MediaBundle\Entity\HomeImage;
use Application\Sonata\MediaBundle\Entity\Logo;
use Application\Sonata\MediaBundle\Entity\MediaImage;
use Application\Sonata\MediaBundle\Entity\NewsLetterMedia;
use Application\Sonata\MediaBundle\Entity\PostMedia;
use Application\Sonata\MediaBundle\Entity\PreviewImage;
use Application\Sonata\MediaBundle\Entity\QuotationImage;
use Application\Sonata\MediaBundle\Entity\RiderMedia;
use Application\Sonata\MediaBundle\Entity\TeamStaffImage;
use Application\Sonata\MediaBundle\Entity\Media;
use MotogpBundle\Entity\Gallery;
use Psr\Log\LoggerInterface;
use stringEncode\Exception;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use MotogpBundle\Services\Newsletters;
use MotogpBundle\Entity\Newsletter;


class RegenImagesCommand extends ContainerAwareCommand
{

    //TODO: get available locales from app config
    const LOCALE_EN = 1;
    const LOCALE_ES = 2;



    protected function configure()
    {
        $this
            ->setName('motogp:regen:images')
            ->setDescription('regen-images')
            ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            ->addArgument('off', InputArgument::OPTIONAL, 'Argument description')
            ->addArgument('to', InputArgument::OPTIONAL, 'Argument description')
        ;
    }

    protected function updateCache () {
//        $cacheManager = $this->getContainer()->get('liip_imagine.cache.manager');
//        $cacheManager->remove();
        // $cacheManager->resolve();
    }

    protected function regenImages($input, $output) {


        $class = $argument = $input->getArgument('argument');
        $off = $argument = $input->getArgument('off');
        $to = $argument = $input->getArgument('to');

        $images = [];

        if ($class == 'FeaturedMedia')
            $images = array_merge($images, $this->em->getRepository(FeaturedMedia::class)->findAll());
        if ($class == 'FooterImage')
            $images = array_merge($images, $this->em->getRepository(FooterImage::class)->findAll());
        if ($class == 'GalleryMedia')
            $images = array_merge($images, $this->em->getRepository(GalleryMedia::class)->findAll());
        if ($class == 'HeaderImage')
            $images = array_merge($images, $this->em->getRepository(HeaderImage::class)->findAll());
        if ($class == 'HomeImage')
            $images = array_merge($images, $this->em->getRepository(HomeImage::class)->findAll());
        if ($class == 'Logo')
            $images = array_merge($images, $this->em->getRepository(Logo::class)->findAll());
        if ($class == 'NewsLetterMedia')
            $images = array_merge($images, $this->em->getRepository(NewsLetterMedia::class)->findAll());
        if ($class == 'PostMedia')
            $images = array_merge($images, $this->em->getRepository(PostMedia::class)->findAll());
        if ($class == 'PreviewImage')
            $images = array_merge($images, $this->em->getRepository(PreviewImage::class)->findAll());
        if ($class == 'QuotationImage')
            $images = array_merge($images, $this->em->getRepository(QuotationImage::class)->findAll());
        if ($class == 'RiderMedia')
            $images = array_merge($images, $this->em->getRepository(RiderMedia::class)->findAll());
        if ($class == 'TeamStaffImage')
            $images = array_merge($images, $this->em->getRepository(TeamStaffImage::class)->findAll());



        $count = 0;


        dump(count($images));
        dump(count($off));
        dump(count($to));

        foreach ($images as $f) {

            if ($f->getProviderMetadata() && $f->getProviderMetadata()['filename']) {
                $fsUrl = __DIR__ . '/../../../web/uploads/' . $f->getProviderMetadata()['filename'];
                if (file_exists($fsUrl)){
                    $f->setBinaryContent($fsUrl);
                }
                $output->writeln($fsUrl);

                $count++;

            }

        }

        //$this->em->flush();

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->em = $this->getContainer()->get('doctrine')->getManager();
        $this->output = $output;

        $this->regenImages($input, $output);
    }

}
