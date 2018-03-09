<?php

namespace MotogpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use MotogpBundle\Entity\Gallery;
use MotogpBundle\Entity\Post;
use MotogpBundle\Entity\Modality;
use MotogpBundle\Entity\Rider;
use MotogpBundle\Entity\Score;
use MotogpBundle\Entity\Video;
use MotogpBundle\Entity\Sponsor;
use MotogpBundle\Entity\Circuit;
use MotogpBundle\Entity\RiderTeam;
use MotogpBundle\Entity\Team;
use MotogpBundle\Entity\TeamCategory;
use MotogpBundle\Entity\Contact;


class ContactController extends Controller
{


    /**
     *
     */
    public function contactFormAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $em = $this->getDoctrine()->getManager();

        $gallery  = $em->getRepository(Gallery::class)->findOneBySlug('contact_moto_gp');

        $homeRiders = $em->getRepository(Rider::class)->findHomeRiders();

        
        $ct = new Contact();

        $form = $this->createForm('MotogpBundle\Form\ContactType', $ct);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {

            $data = array(
                'name' => $ct->getName(),
                'surname' => $ct->getSurname(),
                'phone' => $ct->getPhone(),
                'address' => $ct->getAddress(),
                'postcode' => $ct->getPostcode(),
                'comments' => $ct->getComments(),
                'email' => $ct->getEmail(),
            );


            $mail = $this->getParameter('general_mailing');
            $from = $this->getParameter('mailer_user');

            $message = \Swift_Message::newInstance()
                ->setSubject('Formulario de contacto')
                ->setFrom($from)
                ->setTo($mail)
                ->setReplyTo($data['email'])
                ->setContentType("text/html")
                ->setBody($this->renderView('Default/email.html.twig',$data,'text/html'));


            $mailLogger = new \Swift_Plugins_Loggers_ArrayLogger();
            $this->get('mailer')->registerPlugin(new \Swift_Plugins_LoggerPlugin($mailLogger));

            $result = $this->get('mailer')->send($message);
            $spool = $this->get('mailer')->getTransport()->getSpool();
            $transport = $this->get('swiftmailer.transport.real');

            $spool->flushQueue($transport);


            return $this->redirectToRoute('public_contact_success');
        }


        return $this->render('MotogpBundle:Public/Contact:contact-form.html.twig', array(

            'form' => $form->createView(),
        ));
    }


//    /**
//     * Displays a form to edit an existing hotele entity.
//     * @I18nRoute({ "en": "/en/contact/success", "fr": "/fr/contact/success", "es": "/es/contacto/enviado" }, name="public_contact_success")
//     * @Method({"GET", "POST"})
//     */
//    public function contactFormSuccessAction(Request $request) {
//
//        $em = $this->getDoctrine()->getManager();
//        $hoteles = $em->getRepository('UseradminBundle:Hoteles')->findAll();
//
//        return $this->render('UseradminBundle:Public/Contact:contact-form-success.html.twig', array(
//            'hoteles' => $hoteles
//        ));
//    }

}
