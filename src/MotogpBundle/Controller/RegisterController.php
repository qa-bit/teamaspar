<?php

namespace MotogpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use MotogpBundle\Entity\Gallery;
use MotogpBundle\Entity\Modality;
use MotogpBundle\Entity\Rider;
use MotogpBundle\Entity\RiderTeam;
use MotogpBundle\Entity\Customer;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


class RegisterController extends Controller
{

    private function getMainTeam($modality = null) {

        $em = $this->getDoctrine()->getManager();
        $team  = $em->getRepository(RiderTeam::class)->findMain();

        return $team;
    }


    /**
     *
     */
    public function registerFormAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $modalitySlug = $request->get('modality');

        $modality = $em->getRepository(Modality::class)->findOneBySlug($modalitySlug);

        $gallery  = $em->getRepository(Gallery::class)->findOneBySlug('register_'.str_replace('-', '_',  $modalitySlug));

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
                'url' => $url.'?cc='.$hash
            );


            $mail = $this->getParameter('general_mailing');
            $from = $this->getParameter('mailer_user');

            $message = \Swift_Message::newInstance()
                ->setSubject('ANGEL NIETO TEAM - Confirmación de registro')
                ->setFrom($from)
                ->setTo($customer->getEmail())
                ->setReplyTo($from)
                ->setContentType("text/html")
                ->setBody($this->renderView('MotogpBundle:Default:Register/confirmation-email.html.twig',$data,'text/html'));


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

    public function registerFormSuccessAction(Request $request) {

        $modalitySlug = $request->get('modality');

        $em = $this->getDoctrine()->getManager();

        $modality = $em->getRepository(Modality::class)->findOneBySlug($modalitySlug);

        $gallery  = $em->getRepository(Gallery::class)->findOneBySlug('register_'.str_replace('-', '_',  $modalitySlug));

        $homeRiders = $em->getRepository(Rider::class)->findHomeRiders();


        return $this->render('MotogpBundle:Default/Register:register-success.html.twig', array(
            'riders' => $homeRiders,
            'gallery' => $gallery,
            'modality' => $modality,
            'team' => $this->getMainTeam()
        ));
    }

    public function confirmFormSuccessAction(Request $request) {

        $modalitySlug = $request->get('modality');

        $em = $this->getDoctrine()->getManager();

        $modality = $em->getRepository(Modality::class)->findOneBySlug($modalitySlug);

        $gallery  = $em->getRepository(Gallery::class)->findOneBySlug('register_'.str_replace('-', '_',  $modalitySlug));

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

}
