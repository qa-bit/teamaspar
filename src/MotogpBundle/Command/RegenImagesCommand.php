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



    protected function getCount() {


        $images = [];


        $images = array_merge($images, $this->em->getRepository(FeaturedMedia::class)->findAll());
        $images = array_merge($images, $this->em->getRepository(FooterImage::class)->findAll());
        $images = array_merge($images, $this->em->getRepository(GalleryMedia::class)->findAll());
        $images = array_merge($images, $this->em->getRepository(HeaderImage::class)->findAll());
        $images = array_merge($images, $this->em->getRepository(HomeImage::class)->findAll());
        $images = array_merge($images, $this->em->getRepository(Logo::class)->findAll());
        $images = array_merge($images, $this->em->getRepository(NewsLetterMedia::class)->findAll());
        $images = array_merge($images, $this->em->getRepository(PostMedia::class)->findAll());
        $images = array_merge($images, $this->em->getRepository(PreviewImage::class)->findAll());
        $images = array_merge($images, $this->em->getRepository(QuotationImage::class)->findAll());
        $images = array_merge($images, $this->em->getRepository(RiderMedia::class)->findAll());
        $images = array_merge($images, $this->em->getRepository(TeamStaffImage::class)->findAll());

        return count($images);

    }

    protected function regenImages($input, OutputInterface $output, $off, $to) {


        $class = $argument = $input->getArgument('argument');


        $images = [];


        $images = array_merge($images, $this->em->getRepository(FeaturedMedia::class)->findAll());
        $images = array_merge($images, $this->em->getRepository(FooterImage::class)->findAll());
        $images = array_merge($images, $this->em->getRepository(GalleryMedia::class)->findAll());
        $images = array_merge($images, $this->em->getRepository(HeaderImage::class)->findAll());
        $images = array_merge($images, $this->em->getRepository(HomeImage::class)->findAll());
        $images = array_merge($images, $this->em->getRepository(Logo::class)->findAll());
        $images = array_merge($images, $this->em->getRepository(NewsLetterMedia::class)->findAll());
        $images = array_merge($images, $this->em->getRepository(PostMedia::class)->findAll());
        $images = array_merge($images, $this->em->getRepository(PreviewImage::class)->findAll());
        $images = array_merge($images, $this->em->getRepository(QuotationImage::class)->findAll());
        $images = array_merge($images, $this->em->getRepository(RiderMedia::class)->findAll());
        $images = array_merge($images, $this->em->getRepository(TeamStaffImage::class)->findAll());



        $count = 0;


        $output->writeln("{$off} -> {$to}");

        for ($i=$off; $i<$to;$i++) {

            $f = $images[$i];

            if ($f->getProviderMetadata() && $f->getProviderMetadata()['filename']) {
                $fsUrl = __DIR__ . '/../../../web/uploads/' . $f->getProviderMetadata()['filename'];
                if (file_exists($fsUrl)){
                    $f->setBinaryContent($fsUrl);
                }
            }

        }

        $this->em->flush();

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->em = $this->getContainer()->get('doctrine')->getManager();
        $this->output = $output;


        $count = $this->getCount();


        $off = 0;


        for ($i=6000; $i < $count; $i+=50) {
            $off = $i;
            $to = $i+50;
            $this->regenImages($input, $output, $off, $to);

        }
    }

}
