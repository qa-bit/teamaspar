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

class Setup extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:initial-setup')
            ->setDescription('Generate initial data')
            ->setHelp('Generate initial data');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $slugify = new Slugify();

        $em = $this->getContainer()->get('doctrine.orm.entity_manager');


        $modalities = [
            'Moto GP',
            'Moto 3',
            'FIM-JR'
        ];


        $customerTypes = [
            ['slug' => 'public', 'name' => 'Público'],
            ['slug' => 'sponsor', 'name' => 'Sponsor'],
            ['slug' => 'media', 'name' => 'Medio'],
        ];

        $slugs = ['moto-2', 'moto-3', 'fim-jr'];

        $galleries =  ['inicio', 'contacto', 'noticias', 'videos', 'imagenes', 'motos', 'staff', 'sponsor', 'riders', 'register'];


        $index = 0;

        foreach ($slugs as $m){

            $old = $em->getRepository(Modality::class)->findOneBySlug($m);

            if ($old === null) {
                $new = new Modality();
                $new->setSlug($m);
                $new->setName($modalities[$index]);
                $em->persist($new);
            }

            $index++;
        }

        $em->flush();



        foreach ($customerTypes as $m){

            $old = $em->getRepository(CustomerType::class)->findOneBySlug($m['slug']);

            if ($old === null) {
                $new = new CustomerType();
                $new->setSlug($m['slug']);
                $new->setName($m['name']);
                $em->persist($new);
            }

            $index++;
        }

        $em->flush();

        
        foreach ($galleries as $g) {
            foreach ($modalities as $m) {
                $mod = $em->getRepository(Modality::class)->findOneByName($m);

                $name = $g.' - '.$mod->getName();

                $old = $em->getRepository(Gallery::class)->findOneByName($name);

                if ($old === null) {

                    $new = new Gallery();
                    $new->setModality($mod);
                    $new->setName($name);
                    $new->setSlug($slugify->slugify($name, '_'));
                    $em->persist($new);
                }

            }
        }

        $em->flush();

        $mt = $em->getRepository(RiderTeam::class)->findOneByMain(true);

        if ($mt === null) {
            $mt = new RiderTeam();

            $mt->setName('Ángel Nieto Team');
            $mt->setNameEN('Ángel Nieto Team');
            $mt->setMain(true);

            $em->persist($mt);

            $em->flush();

        }
        
        
        $riders = $em->getRepository(Rider::class)->findAll();
        $posts = $em->getRepository(Post::class)->findAll();
        $sponsors = $em->getRepository(Sponsor::class)->findAll();


        foreach ($riders as $r) {
            $name = $r->getName().' '.$r->getSurname().$r->getNumber();
            $r->setSlug($slugify->slugify($name, '-'));
            $em->persist($r);
        }

        foreach ($posts as $r) {
            $name = $r->getName();
            $r->setSlug($slugify->slugify($name, '-'));
            $em->persist($r);
        }

        foreach ($sponsors as $r) {
            $name = $r->getName();
            $r->setSlug($slugify->slugify($name, '-'));
            $em->persist($r);
        }

        $em->flush();


    }
}