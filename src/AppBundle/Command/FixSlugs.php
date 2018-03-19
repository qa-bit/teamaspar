<?php

/**
 * Created by PhpStorm.
 * User: egm
 * Date: 20/02/18
 * Time: 15:47
 */

namespace AppBundle\Command;

use MotogpBundle\Entity\RiderTeam;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use MotogpBundle\Entity\Modality;
use MotogpBundle\Entity\Gallery;
use MotogpBundle\Entity\CustomerType;
use Cocur\Slugify\Slugify;
use MotogpBundle\Entity\Rider;
use MotogpBundle\Entity\Post;
use MotogpBundle\Entity\Sponsor;

class FixSlugs extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:fix-slugs')
            ->setDescription('fix slugs')
            ->setHelp('fix slugs');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $slugify = new Slugify();

        $em = $this->getContainer()->get('doctrine.orm.entity_manager');

        $posts = $em->getRepository(Post::class)->findAll();

        foreach ($posts as $post) {
            $post->setSlugEn($slugify->slugify($post->getNameEN(), '-'));
        }

        $em->flush();

    }
}