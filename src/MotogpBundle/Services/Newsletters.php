<?php

namespace MotogpBundle\Services;

use MotogpBundle\Entity\Newsletter;
use MotogpBundle\Entity\Post;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Doctrine\ORM\EntityManager;
use MotogpBundle\Entity\Customer;

class Newsletters
{

    const MAIL_SUBJECT_PREFIX = 'Ángel Nieto Team ';

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


        if (!count($groups)) {
            return $customers;
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
        $html = $this->renderNewsletter($newsletter, $locale);


        $html = str_replace('http://localhost', $this->url_scheme, $html);
        
        $circuitName = $newsletter->getPost()->getCircuit()->getName();

        $tagAbbr = ($post->getCategory() && $post->getCategory()->getAbbr())
            ? '(' . $post->getCategory()->getAbbr() . ')'
            : '';

        $postTitle = $locale == 'es' ? $newsletter->getName() : $newsletter->getNameEN();

        $subjectTitle = "$circuitName $tagAbbr - $postTitle";

        $message = \Swift_Message::newInstance()
            ->setSubject($subjectTitle)
            ->setFrom($from, self::MAIL_SUBJECT_PREFIX . $newsletter->getPost()->getModality())
            ->setBcc($recipients)
            ->setReplyTo($from)
            ->setContentType("text/html")
            ->setBody($html);


        $mailLogger = new \Swift_Plugins_Loggers_ArrayLogger();

        $this->mailer->registerPlugin(new \Swift_Plugins_LoggerPlugin($mailLogger));


        if ($this->mailer->send($message)) {
            $spool = $this->mailer->getTransport()->getSpool();
            $spool->flushQueue($this->transport);
            return true;
        }

        return false;

    }

    public function renderNewsletter(Newsletter $newsletter, $locale = 'es')
    {

        $data = [
            'name' => $locale == 'es' ? $newsletter->getName() : $newsletter->getNameEN(),
            'title' => $locale == 'es' ? $newsletter->getName() : $newsletter->getNameEN(),
            'featuredMedia' => $newsletter->getFeaturedMedia(),
            'medias' => $newsletter->getMedia(),
            'newsletter' => $newsletter,
            'body' => $locale == 'es' ? $newsletter->getDescription() : $newsletter->getDescriptionEN(),
            'post' => $newsletter->getPost(),
            'locale' => $locale,
            'url_scheme' => $this->url_scheme
        ];

        return $this->templating->render('MotogpBundle:Default:Newsletters/newsletters-email.html.twig', $data, 'text/html');
    }


}