<?php

namespace MotogpBundle\Command;

use Doctrine\Common\Collections\ArrayCollection;
use MotogpBundle\Entity\Document;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MigrateDocumentsv1Command extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('motogp:migrate:doc1')
            ->setDescription('...')
            ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $argument = $input->getArgument('argument');

        $em = $this->getContainer()->get('doctrine')->getManager();

        $documents = $em->getRepository(Document::class)->findAll();


        foreach ($documents as $d) {

            $d->setModalities(new ArrayCollection());
            $d->setLocales([]);

            $d->addModality($d->getModality());
            $d->addLocale($d->getLocale());

        }


        $em->flush();


        $output->writeln('Command result.');
    }

}
