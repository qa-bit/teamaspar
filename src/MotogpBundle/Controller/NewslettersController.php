<?php

namespace MotogpBundle\Controller;

use MotogpBundle\Entity\Newsletter;
use MotogpBundle\Entity\NewsletterHistory;
use MotogpBundle\Entity\NewsletterMailInfo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use MotogpBundle\Entity\Gallery;
use MotogpBundle\Entity\Modality;
use MotogpBundle\Entity\Rider;
use MotogpBundle\Entity\RiderTeam;
use MotogpBundle\Entity\Customer;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Translation\Translator;
use MotogpBundle\Entity\Sponsor;


class NewslettersController extends Controller
{

    const MAIL_SUBJECT_PREFIX = 'Sama Qatar Ángel Nieto Team ';
    const MAIL_CONFIRMATION_SUBJECT = 'Confirmación de registro';

    const MODES = [
        'fan'      => 'public',
        'sponsor'  => 'partner',
        'media'    => 'media',
        'gp_guest' => 'gpguest',
        'partner'  => 'partner'
    ];


    private function getMainTeam($modality = null)
    {

        $em = $this->getDoctrine()->getManager();
        $team = $em->getRepository(RiderTeam::class)->findMain();

        return $team;
    }

    public function getLogoResponse() {
        $img = "logo_newsletters.png";

        $filepath = $this->get('kernel')->getRootDir()."/../web/media/newsletters/".$img;

        $response = new Response();
        $disposition = $response->headers->makeDisposition(ResponseHeaderBag::DISPOSITION_INLINE, $img);
        $response->headers->set('Content-Disposition', $disposition);
        $response->headers->set('Content-Type', 'image/png');
        $response->setContent(file_get_contents($filepath));
        return $response;
    }

    public function renderStatsImageAction(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $customerId = $request->get('customer');
        $newsletterId = $request->get('newsletter');
        $ip = $request->getClientIp();
        $userAgent = $request->headers->get('User-Agent');


        if (!$newsletterId || !$customerId) {
            return $this->getLogoResponse();
        }

        $customer = $em->getRepository(Customer::class)->find($customerId);
        $newsletter  =$em->getRepository(Newsletter::class)->find($newsletterId);


        if (!$newsletter && !$customer) {
            return $this->getLogoResponse();
        }




        $newsletterHistory = $em->getRepository(NewsletterHistory::class)->findOneBy(
            ['customer' => $customer, 'newsletter' => $newsletter]
        );


        if (!$customer || !$newsletterHistory) {
            $newsletterHistory = new NewsletterHistory();
            $newsletterHistory->setCustomer($customer);
            $newsletterHistory->setNewsletter($newsletter);
            $newsletterHistory->setIp($ip);
            $newsletterHistory->setUserAgent($userAgent);
            $em->persist($newsletterHistory);
            $em->flush();
        }


       return $this->getLogoResponse();

    }

    public function sendNotificationEmails($customer) {


        $mailLogger = new \Swift_Plugins_Loggers_ArrayLogger();
        $this->get('mailer')->registerPlugin(new \Swift_Plugins_LoggerPlugin($mailLogger));


        $notificationEmails = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository(NewsletterMailInfo::class)
            ->findBy(['active' => true])
        ;

        $from = $this->getParameter('mailer_user');

        $data = ['customer' => $customer];



        $mailHtml = $this->renderView('MotogpBundle:Default:Register/notification-email.html.twig', $data, 'text/html');

        foreach ($notificationEmails as $no) {

            $message = \Swift_Message::newInstance()
                ->setSubject(self::MAIL_SUBJECT_PREFIX . ' - nuevo inscrito a newsletters')
                ->setFrom($from)
                ->setTo($no->getEmail())
                ->setReplyTo($from)
                ->setContentType("text/html")
                ->setBody($mailHtml)
            ;

            $this->get('mailer')->send($message);

        }


        try {
            $spool = $this->get('mailer')->getTransport()->getSpool();
            $transport = $this->get('swiftmailer.transport.real');
            $spool->flushQueue($transport);
        } catch (\Swift_TransportException $e) {
            die();
        }

    }

    public function registerFormAction(Request $request)
    {

        $mode = 'fan';


        switch ($request->attributes->get('_route')) {
            case 'public_register_media' : {
                $mode = 'media';
                break;
            }
            case 'public_register_partner' : {
                $mode = 'partner';
                break;
            }
            case 'public_register_gpguest' : {
                $mode = 'gp_guest';
                break;
            }
        }

        $locale = $request->get('_locale');


        $em = $this->getDoctrine()->getManager();

        $modalitySlug = $request->get('modality');

        $modality = $em->getRepository(Modality::class)->findOneBySlug($modalitySlug);

        $gallery = $em->getRepository(Gallery::class)->findOneBySlug('register_' . str_replace('-', '_', $modalitySlug));

        $homeRiders = $em->getRepository(Rider::class)->getHomeRidersInModality($modality);

        $customer = new Customer();

        $customer->setLocale($locale);
        $customer->setCountry(strtoupper($locale));

        if ($locale == 'en') {
            $customer->setCountry('GB');
        }

        $customer->setType(self::MODES[$mode]);


        $form = $this->createForm('MotogpBundle\Form\RegisterType', $customer);
        $form->handleRequest($request);

        $sponsors = $this->getSponsors($modality);


        if ($form->isSubmitted() && $form->isValid()) {

            if ($customer->getType() == 'public') {
                $customer->setMediaType(null);
                $customer->setAdminConfirmed(true);
            }


            $hashString = $customer->getEmail();

            $hash = password_hash($hashString, PASSWORD_DEFAULT);

            $customer->setActivationHash($hash);

            $url = $this->generateUrl(
                'public_register_confirmation',
                array(
                    'modality' => $modalitySlug
                ),
                UrlGeneratorInterface::ABSOLUTE_URL
            );

            $data = array(
                'name' => $customer->getName(),
                'url' => $url . '?cc=' . $hash
            );


            $mail = $this->getParameter('general_mailing');
            $from = $this->getParameter('mailer_user');

            $message = \Swift_Message::newInstance()
                ->setSubject(self::MAIL_SUBJECT_PREFIX.' - '.self::MAIL_CONFIRMATION_SUBJECT)
                ->setFrom($from)
                ->setTo($customer->getEmail())
                ->setReplyTo($from)
                ->setContentType("text/html")
                ->setBody($this->renderView('MotogpBundle:Default:Register/confirmation-email.html.twig', $data, 'text/html'))
            ;


            $mailLogger = new \Swift_Plugins_Loggers_ArrayLogger();
            $this->get('mailer')->registerPlugin(new \Swift_Plugins_LoggerPlugin($mailLogger));

            $result = $this->get('mailer')->send($message);

            $spool = $this->get('mailer')->getTransport()->getSpool();
            $transport = $this->get('swiftmailer.transport.real');

            $spool->flushQueue($transport);

            $em->persist($customer);
            $em->flush();

            return $this->redirectToRoute('public_register_success', ['modality' => $modalitySlug]);
        }


        return $this->render('MotogpBundle:Default/Register:register-form.html.twig', array(

            'form' => $form->createView(),
            'riders' => $homeRiders,
            'gallery' => $gallery,
            'modality' => $modality,
            'sponsors' => $sponsors,
            'team' => $this->getMainTeam(),
            'mode' => $mode
        ));
    }

    public function registerFormSuccessAction(Request $request)
    {

        $modalitySlug = $request->get('modality');

        $em = $this->getDoctrine()->getManager();

        $modality = $em->getRepository(Modality::class)->findOneBySlug($modalitySlug);

        $gallery = $em->getRepository(Gallery::class)->findOneBySlug('register_' . str_replace('-', '_', $modalitySlug));

        $homeRiders = $em->getRepository(Rider::class)->findHomeRiders();


        return $this->render('MotogpBundle:Default/Register:register-success.html.twig', array(
            'riders' => $homeRiders,
            'gallery' => $gallery,
            'modality' => $modality,
            'team' => $this->getMainTeam()
        ));
    }

    public function confirmFormSuccessAction(Request $request)
    {

        $modalitySlug = $request->get('modality');

        $em = $this->getDoctrine()->getManager();

        $modality = $em->getRepository(Modality::class)->findOneBySlug($modalitySlug);

        $gallery = $em->getRepository(Gallery::class)->findOneBySlug('register_' . str_replace('-', '_', $modalitySlug));

        $homeRiders = $em->getRepository(Rider::class)->findHomeRiders();

        $hash = $request->get('cc');

        $customer = $em->getRepository(Customer::class)->findOneByActivationHash($hash);

        if ($customer) {
            $customer->setActivationHash(null);
            $customer->setUserConfirmed(true);
            $em->persist($customer);
            $em->flush();

            $this->sendNotificationEmails($customer);
        }

        return $this->render('MotogpBundle:Default/Register:confirm-success.html.twig', array(
            'riders' => $homeRiders,
            'gallery' => $gallery,
            'modality' => $modality,
            'team' => $this->getMainTeam()
        ));
    }

    public function requestUnsubscribeAction(Request $request)
    {

        $sent = false;

        $em = $this->getDoctrine()->getManager();

        $modalitySlug = $request->get('modality');

        $modality = $em->getRepository(Modality::class)->findOneBySlug($modalitySlug);

        $gallery = $em->getRepository(Gallery::class)->findOneBySlug('register_' . str_replace('-', '_', $modalitySlug));

        $homeRiders = $em->getRepository(Rider::class)->getHomeRidersInModality($modality);


        $form = $this->createForm('MotogpBundle\Form\UnsubscribeType');
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $email = $request->get('motogpbundle_unsubscribe')['email'];

            $customer = $em->getRepository(Customer::class)->findOneByEmail($email);


            if ($customer) {
                $this->sendUnsubscribeEmail($customer, $modalitySlug);
                $sent = true;
            } else {

                $locale = $request->get('_locale');

                $errorMsg = $locale == 'es' ? 'Este email no está registrado' : 'This email address is not registered';
                $form->get('email')->addError(new FormError($errorMsg));
            }

        }


        return $this->render('MotogpBundle:Default/Register:unsubscribe-form.html.twig', array(

            'form' => $form->createView(),
            'sent' => $sent,
            'riders' => $homeRiders,
            'gallery' => $gallery,
            'modality' => $modality,
            'team' => $this->getMainTeam()
        ));

    }

    public function confirmUnsubscriptionAction(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $cc = $request->get('cc');
        $success = true;

        if (!$cc) {
            $success = false;
        } else {
            $customer = $em->getRepository(Customer::class)->findOneByDeactivationHash($cc);

            if ($customer == null) {
                $success = false;
            } else {
                $em->remove($customer);
                $em->flush();
            }
        }

        $modalitySlug = $request->get('modality');
        $modality = $em->getRepository(Modality::class)->findOneBySlug($modalitySlug);
        $gallery = $em->getRepository(Gallery::class)->findOneBySlug('register_' . str_replace('-', '_', $modalitySlug));
        $homeRiders = $em->getRepository(Rider::class)->findHomeRiders();

        return $this->render('MotogpBundle:Default/Register:unsubscribe-step.html.twig', array(
            'riders' => $homeRiders,
            'success' => $success,
            'gallery' => $gallery,
            'modality' => $modality,
            'team' => $this->getMainTeam()
        ));
    }


    /**
     * @Route("/test-newsletter/{newsletter}")
     */
    public function renderNewsletter(Newsletter $newsletter) {
        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            $nm = $templating = $this->container->get('motogp.newsletters_manager');

            $nm->sendMail($newsletter, 'es');

            die();

            return $this->render('MotogpBundle:Default/Register:unsubscribe-step.html.twig', []);

//            return new Response($nm->renderNewsletter($newsletter));
        }

        return new Response(Response::HTTP_BAD_REQUEST);
    }

    public function getSponsors($modality) {
        $em = $this->getDoctrine()->getManager();

        $sponsors = [1 => [], 2 => [], 3 => []];

        for ($i = 3; $i>0; $i--){
            $colorSponsors = $em->getRepository(Sponsor::class)->getColorByModalityAndLevel($modality, $i);
            $bnSponsors = $em->getRepository(Sponsor::class)->getBNByModalityAndLevel($modality, $i);
            $sponsors[$i]['color'] = $colorSponsors;
            $sponsors[$i]['bn'] = $bnSponsors;
        }

        return $sponsors;

    }

    protected function sendUnsubscribeEmail($customer, $modalitySlug) {

        $em = $this->getDoctrine()->getManager();

        $hashString = $customer->getEmail().$customer->getId();

        $hash = password_hash($hashString, PASSWORD_DEFAULT);

        $customer->setDeactivationHash($hash);

        $url = $this->generateUrl(
            'newsletters_unsubscribe_confirmation',
            array(
                'modality' => $modalitySlug
            ),
            UrlGeneratorInterface::ABSOLUTE_URL
        );

        $data = array(
            'name' => $customer->getName(),
            'url' => $url . '?cc=' . $hash
        );


        $mail = $this->getParameter('general_mailing');
        $from = $this->getParameter('mailer_user');

        $locale = $customer->getLocale();

        $message = $locale == 'es' ? "Confirmación de baja" : 'Cancel subscription';

        $message = \Swift_Message::newInstance()
            ->setSubject('SAMA QATAR ANGEL NIETO TEAM'.' '.$message)
            ->setFrom($from)
            ->setTo($customer->getEmail())
            ->setReplyTo($from)
            ->setContentType("text/html")
            ->setBody($this->renderView('MotogpBundle:Default:Register/unsubscribe-email.html.twig', $data, 'text/html'));


        $mailLogger = new \Swift_Plugins_Loggers_ArrayLogger();
        $this->get('mailer')->registerPlugin(new \Swift_Plugins_LoggerPlugin($mailLogger));

        $result = $this->get('mailer')->send($message);
        $spool = $this->get('mailer')->getTransport()->getSpool();
        $transport = $this->get('swiftmailer.transport.real');

        $spool->flushQueue($transport);

        $em->persist($customer);
        $em->flush();
    }
}
