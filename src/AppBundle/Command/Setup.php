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
use Cocur\Slugify\Slugify;

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


        $modalities = ['Moto GP', 'Moto 3', 'Campeonato españa'];

        $galleries =  ['inicio', 'contacto', 'noticias', 'videos', 'imagenes', 'motos', 'staff', 'sponsor', 'riders', 'register'];
        
        foreach ($modalities as $m){
            $old = $em->getRepository(Modality::class)->findOneByName($m);

            if ($old === null) {
                $new = new Modality();
                $new->setName($m);
                $em->persist($new);
            }
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

    }
}