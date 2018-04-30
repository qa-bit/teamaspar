<?php

namespace MotogpBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use MotogpBundle\Services\Newsletters;
use MotogpBundle\Entity\Newsletter;

class SendNewslettersCommand extends ContainerAwareCommand
{

    //TODO: get available locales from app config
    const LOCALES = ['en', 'es'];

    protected function configure()
    {
        $this
            ->setName('motogp:newsletters:send')
            ->setDescription('...')
            ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }
    
    protected function sendNewsLetters() {
        $newsletters = $this->em->getRepository(Newsletter::class)->getQueued();
        foreach ($newsletters as $newsletter) {
            $sent = false;
            foreach (self::LOCALES as $locale) {
                $this->output->writeln('sending '.$newsletter->getName(). ' '.$locale);
                if ($this->nm->sendMail($newsletter, $locale))
                    $sent = true;

            }

            if ($sent) {
                $newsletter->setQueued(false);
                $newsletter->setLastSendAt(new \DateTime());
                $this->output->writeln('sent', $sent);
            }
        }

        $this->em->flush();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->em = $this->getContainer()->get('doctrine')->getManager();
        $this->nm = $this->getContainer()->get('motogp.newsletters_manager');
        $this->output = $output;

        $this->sendNewsLetters();
    }

}
