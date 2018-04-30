<?php

namespace MotogpBundle\Controller;

use MotogpBundle\Entity\Newsletter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use MotogpBundle\Entity\Gallery;
use MotogpBundle\Entity\Modality;
use MotogpBundle\Entity\Rider;
use MotogpBundle\Entity\RiderTeam;
use MotogpBundle\Entity\Customer;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Translation\Translator;



class NewslettersController extends Controller
{

    private function getMainTeam($modality = null)
    {

        $em = $this->getDoctrine()->getManager();
        $team = $em->getRepository(RiderTeam::class)->findMain();

        return $team;
    }

    public function registerFormAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $modalitySlug = $request->get('modality');

        $modality = $em->getRepository(Modality::class)->findOneBySlug($modalitySlug);

        $gallery = $em->getRepository(Gallery::class)->findOneBySlug('register_' . str_replace('-', '_', $modalitySlug));

        $homeRiders = $em->getRepository(Rider::class)->getHomeRidersInModality($modality);

        $customer = new Customer();

        $form = $this->createForm('MotogpBundle\Form\RegisterType', $customer);
        $form->handleRequest($request);


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
                ->setSubject('ANGEL NIETO TEAM - Confirmación de registro')
                ->setFrom($from)
                ->setTo($customer->getEmail())
                ->setReplyTo($from)
                ->setContentType("text/html")
                ->setBody($this->renderView('MotogpBundle:Default:Register/confirmation-email.html.twig', $data, 'text/html'));


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
            'team' => $this->getMainTeam()
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
            ->setSubject('ANGEL NIETO TEAM'.' '.$message)
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
