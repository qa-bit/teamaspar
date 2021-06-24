<?php

namespace MotogpBundle\Services;

use MotogpBundle\Entity\Newsletter;
use MotogpBundle\Entity\Post;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Doctrine\ORM\EntityManager;
use MotogpBundle\Entity\Customer;
use MotogpBundle\Entity\Traits\InModalityTrait;

class NewslettersV2
{

    const MAIL_SUBJECT_PREFIX = 'Aspar Team ';

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


    public function sendCustomerEmail($newsletter, $customerId, $html, $message) {

        $failures ='';

        $customer  = $this->em->getRepository(Customer::class)->findOneBy(['email' => $customerId]);

        $html = str_replace('CUSTOMER', $customer->getId(), $html);
        $html = str_replace('NEWSLETTER', $newsletter->getId(), $html);

        $message
            ->setBcc(null)
            ->setTo($customer->getEmail())
            ->setContentType("text/html")
            ->setBody($html)
        ;

        try {
            $mail = $this->mailer->send($message, $failures);
            dump('CMS NEWSLETTER EMAIL');
            dump($customerId);
            dump($mail);
            dump($failures);
            dump('!CMS NEWSLETTER EMAIL');

            return $mail;

        } catch(\Swift_TransportException $e) {

            return ['errors' => $e->getMessage()];
        }

    }


    public function sendMailBCC() {
        
    }

    public function sendMail(Newsletter $newsletter, $locale)
    {

        $recipients = $this->getRecipients($newsletter, $locale);

        if (!count($recipients))
            return ['sent' => false];

        /**
         * @var Post
         */
        $post = $newsletter->getPost();
        $from = $this->mailer_user;
        $html = $this->renderNewsletter($newsletter, $locale);


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


        $errors = "";

        try {
            $message = \Swift_Message::newInstance()
                ->setSubject($subjectTitle)
                ->setFrom($from, self::MAIL_SUBJECT_PREFIX . $mod)
                ->setBcc($recipients)
                ->setReplyTo($from)
                ->setContentType("text/html")
                ->setBody($html)
            ;

        } catch(\Swift_RfcComplianceException $e) {
            return ['sent' => false, 'errors' => $e->getMessage()];
        }



        $mailLogger = new \Swift_Plugins_Loggers_ArrayLogger();

        $this->mailer->registerPlugin(new \Swift_Plugins_LoggerPlugin($mailLogger));

        $failures ='';

        $sents = [];

        foreach ($recipients as $key => $value) {
            $mail = $this->sendCustomerEmail($newsletter, $key, $html, $message);

            if ($mail == true) {
                $sents[] = $key;
            } else {
                $failures.= $mail['errors'].$key;
            }
        }
        
        dump('CMS NEWSLETTERS COUNT');
        dump(count($sents));
        dump('CMS NEWSLETTERS FAILURE');
        dump($failures);
        
        if (count($sents)) {
            return ['sent' => true, 'errors' => $failures];
        }

        return ['sent' => false, 'errors' => $failures];

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

        return $this->templating->render('MotogpBundle:Default:Newsletters/newsletters-email.html.twig', $data, 'text/html');
    }
    
    


}
