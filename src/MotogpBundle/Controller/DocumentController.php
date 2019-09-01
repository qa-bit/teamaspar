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


class DocumentController extends PublicController
{
    public function documentsAction(Request $request)
    {


        if (!$this->isGranted('ROLE_ADMIN')) {
            return $this->redirect('/login');
        }

        $modalitySlug = $request->get('modality');

        $em = $this->getDoctrine()->getManager();

        $modality = $this->getModality($modalitySlug);

        if (!$modality)
            return $this->redirectToRoute('index');

        $homeRiders = $em->getRepository(Rider::class)->getHomeRidersInModality($modality);

        $gallery  = $em->getRepository(Gallery::class)->findOneBySlug('imagenes_'.str_replace('-', '_',  $modalitySlug));

        $circuits = $em->getRepository(Circuit::class)->getCircuitsWithDocumentsInModality($modality);

        dump($circuits);
        die();

        $sponsors = $this->getSponsors($modality);

        return $this->render(
            'MotogpBundle:Default:Documents/documents.html.twig',
            [
                'gallery' => $gallery,
                'circuits' => $circuits,
                'sponsors' => $sponsors,
                'riders' => $homeRiders,
                'modality' => $modality,
                'team' => $this->getMainTeam()
            ]
        );


    }

    public function documentsByYearAction(Request $request)
    {

        if (!$this->isGranted('ROLE_ADMIN') && !$this->isGranted('ROLE_PUBLIC_DOCUMENTS') && !$this->isGranted('ROLE_PUBLIC_DOCUMENTS_ALL')) {
            return $this->redirect('/login');
        }

        $em = $this->getDoctrine()->getManager();

        $modalitySlug = $request->get('modality');

        $year = $request->get('year');
        $modality = $this->getModality($modalitySlug);

        $modalities = $em->getRepository(Modality::class)->findBy(['active' => true]);
        

        if (!$modality)
            return $this->redirectToRoute('index');

        $homeRiders = $em->getRepository(Rider::class)->getHomeRidersInModality($modality);

        $gallery  = $em->getRepository(Gallery::class)->findOneBySlug('imagenes_'.str_replace('-', '_',  $modalitySlug));

        $circuits = $em->getRepository(Circuit::class)->getCircuitsWithDocumentsInModalityAndYear($modality, $year);

        $sponsors = $this->getSponsors($modality);

        return $this->render(
            'MotogpBundle:Default:Documents/documents_byyear.html.twig',
            [
                'gallery' => $gallery,
                'circuits' => $circuits,
                'riders' => $homeRiders,
                'modality' => $modality,
                'sponsors' => $sponsors,
                'team' => $this->getMainTeam(),
                'year' => $year,
                'modalities' => $modalities
            ]
        );

    }
}
