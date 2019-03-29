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
    const LOCALE_EN = 1;
    const LOCALE_ES = 2;

    protected function configure()
    {
        $this
            ->setName('motogp:newsletters:send')
            ->setDescription('send queued newsletters')
            ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function updateCache () {
//        $cacheManager = $this->getContainer()->get('liip_imagine.cache.manager');
//        $cacheManager->remove();
       // $cacheManager->resolve();
    }
    
    protected function sendNewsLetters() {
        $newsletters = $this->em->getRepository(Newsletter::class)->getQueued();
        foreach ($newsletters as $newsletter) {
            $sent = false;

            $this->output->writeln("CMS NEWSLETTERS UPDATING IMAGE CACHE");
            $newsletter->setQueued(false);
            $this->updateCache();
            $this->em->flush();
            $this->output->writeln("CMS NEWSLETTERS UPDATING IMAGE UPDATED");

            foreach (self::LOCALES as $locale) {

                if ($newsletter->getSendTo() == self::LOCALE_EN && $locale == 'en') continue;
                if ($newsletter->getSendTo() == self::LOCALE_ES && $locale == 'es') continue;

                $this->output->writeln('CMS NEWSLETTERS SENDING '.$newsletter->getName(). ' '.$locale);

                $sent = $this->nm->sendMail($newsletter, $locale);

            }

            if ($sent['sent'] == true) {
                $newsletter->setLastSendAt(new \DateTime());
                $newsletter->setFailed(false);
                $newsletter->setErrorMessage($sent['errors'] ?? '');
                $this->output->writeln('sent', $sent);
            } else {;
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
