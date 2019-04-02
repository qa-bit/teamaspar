<?php

namespace MotogpBundle\Services;

use MotogpBundle\Entity\Newsletter;
use MotogpBundle\Entity\Post;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Doctrine\ORM\EntityManager;
use MotogpBundle\Entity\Customer;
use MotogpBundle\Entity\Traits\InModalityTrait;

class Newsletters
{

    const MAIL_SUBJECT_PREFIX = 'Sama Qatar Ángel Nieto Team ';

    public function __construct(
        TwigEngine $templating,
        \Swift_Mailer $mailer,
        EntityManager $entityManager,
        \Swift_Transport_EsmtpTransport $transport,
        string $mailer_user,
        string $url_scheme

    )
    {
        $this->templating = $templating;
        $this->mailer = $mailer;
        $this->em = $entityManager;
        $this->transport = $transport;
        $this->mailer_user = $mailer_user;
        $this->url_scheme = $url_scheme;
    }

    private function filterByGroups($customers, $groups)
    {


        $customersInGroups = [];

        $customersInCategories = [];

        if (!count($groups)) {
            foreach ($customers as $customer) {

                if ($customer->getGroups()) {
                    if (!count($customer->getGroups()))
                        $customersInCategories[] = $customer;
                } else {
                    $customersInCategories[] = $customer;
                }
            }

            return $customersInCategories;
        }

        foreach ($customers as $customer) {
            foreach ($customer->getGroups() as $cg) {
                foreach ($groups as $g) {
                    if ($g->getId() == $cg->getId()) {
                        $customersInGroups[] = $customer;
                    }
                }
            }
        }

        return $customersInGroups;

    }


    private function getRecipients($newsletter, $locale) {
        $recipients = [];
        foreach ($newsletter->getCustomerTypes() as $type) {
            $slug = $type->getSlug();
            $ct = $this->em->getRepository(Customer::class)->findByType($slug);

            $customers = $this->filterByGroups($ct, $newsletter->getGroups());

            foreach ($customers as $c) {
                if ($c->getLocale() == $locale && $c->getUserConfirmed() && $c->getAdminConfirmed())
                    $recipients[$c->getEmail()] = $c->getName();
            }
        }

        return $recipients;

    }

    public function sendMail(Newsletter $newsletter, $locale)
    {

        $recipients = $this->getRecipients($newsletter, $locale);

        if (!count($recipients))
            return true;

        /**
         * @var Post
         */
        $post = $newsletter->getPost();
        $from = $this->mailer_user;
        $html = str_replace('NEWSLETTER', $newsletter->getId(), $this->renderNewsletter($newsletter, $locale));
        
        $html = str_replace('http://localhost', $this->url_scheme, $html);

        $circuitName = $newsletter->getPost() && $newsletter->getPost()->getCircuit() ?
            $newsletter->getPost()->getCircuit()->getName() : '';

        $tagAbbr = '';

        if ($post) {
            $tagAbbr = ($post->getCategory() && $post->getCategory()->getAbbr())
                ? '(' . $post->getCategory()->getAbbr() . ')'
                : '';
        }

        $postTitle = $locale == 'es' ? $newsletter->getName() : $newsletter->getNameEN();

        $subjectTitle = $post ? "$circuitName $tagAbbr - $postTitle" : $postTitle;

        $mod = $post ? $post->getModality() : $newsletter->getModality();
        

        try {
            $message = \Swift_Message::newInstance()
                ->setSubject($subjectTitle)
                ->setFrom($from, self::MAIL_SUBJECT_PREFIX . $mod)
                ->setBcc($recipients)
                ->setReplyTo($from)
                ->setContentType("text/html")
                ->setBody($html);

        } catch(\Swift_RfcComplianceException $e) {
            return ['sent' => false, 'errors' => $e->getMessage()];
        }



        $mailLogger = new \Swift_Plugins_Loggers_ArrayLogger();

        $this->mailer->registerPlugin(new \Swift_Plugins_LoggerPlugin($mailLogger));

        $failures ='';

        try {
            $mail = $this->mailer->send($message, $failures);
            $spool = $this->mailer->getTransport()->getSpool();
            $spool->flushQueue($this->transport);

        } catch(\Swift_TransportException $e) {
            
            return ['sent' => false, 'errors' => $e->getMessage()];
        }

        
        if ($mail) {
            return ['sent' => true];
        }

        return ['sent' => false];

    }

    public function renderNewsletter(Newsletter $newsletter, $locale = 'es')
    {

        $data = [
            'name' => $locale == 'es' ? $newsletter->getName() : $newsletter->getNameEN(),
            'title' => $locale == 'es' ? $newsletter->getName() : $newsletter->getNameEN(),
            'featuredMedia' => $newsletter->getFeaturedMedia(),
            'medias' => $newsletter->getMedia(),
            'modality' => $newsletter->getModality(),
            'newsletter' => $newsletter,
            'body' => $locale == 'es' ? $newsletter->getDescription() : $newsletter->getDescriptionEN(),
            'post' => $newsletter->getPost(),
            'locale' => $locale,
            'url_scheme' => $this->url_scheme
        ];

        return $this
            ->templating
            ->render('MotogpBundle:Default:Newsletters/newsletters-email.html.twig', $data, 'text/html')
        ;
    }
    
    


}