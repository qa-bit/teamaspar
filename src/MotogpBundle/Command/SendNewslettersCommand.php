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

            $newsletter->setQueued(false);
            $this->em->flush();


            foreach (self::LOCALES as $locale) {
                $this->output->writeln('sending '.$newsletter->getName(). ' '.$locale);

                $sent = $this->nm->sendMail($newsletter, $locale);

            }

            if ($sent['sent'] == true) {
                $newsletter->setLastSendAt(new \DateTime());
                $newsletter->setFailed(false);
                $newsletter->setErrorMessage('');
                $this->output->writeln('sent', $sent);
            } else {
                dump($sent);
                $newsletter->setQueued(false);
                $newsletter->setFailed(true);
                $newsletter->setLastSendAt(null);
                $newsletter->setErrorMessage($sent['errors']);
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
