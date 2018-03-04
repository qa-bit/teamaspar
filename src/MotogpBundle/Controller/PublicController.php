<?php

namespace MotogpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MotogpBundle\Entity\Gallery;
use MotogpBundle\Entity\Post;
use MotogpBundle\Entity\Modality;
use MotogpBundle\Entity\Rider;
use MotogpBundle\Entity\Score;
use MotogpBundle\Entity\Video;
use MotogpBundle\Entity\Sponsor;
use MotogpBundle\Entity\Circuit;

class PublicController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $gallery  = $em->getRepository(Gallery::class)->findOneBySlug('inicio_moto_gp');

        $galleries = $em->getRepository(Gallery::class)->getGalleries();

        $posts  = $em->getRepository(Post::class)->findAll();

        $video = $em->getRepository(Video::class)->findOneById(1);

        $scores = $em->getRepository(Score::class)->findAll();

        $homeRiders = $em->getRepository(Rider::class)->findHomeRiders();

        $colorSponsors = $em->getRepository(Sponsor::class)->findColor();

        $bnSponsors = $em->getRepository(Sponsor::class)->findBn();
        
        
        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render(
                'MotogpBundle:Default:index.html.twig',
                [
                    'index_gallery' => $gallery,
                    'galleries' => $galleries,
                    'posts' => $posts,
                    'video' => $video,
                    'scores' => $scores,
                    'homeRiders' => $homeRiders,
                    'bnSponsors' => $bnSponsors,
                    'colorSponsors' => $colorSponsors,
                ]
            );
        }
        else
            throw new \Symfony\Component\Security\Core\Exception\AccessDeniedException();

    }


    /**
     * @Route("/images")
     */
    public function imagesAction()
    {

        $em = $this->getDoctrine()->getManager();

        $gallery  = $em->getRepository(Gallery::class)->findOneBySlug('imagenes_moto_gp');

       // $galleries = $em->getRepository(Gallery::class)->getGalleries();

        $circuits = $em->getRepository(Circuit::class)->findAll();


        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render(
                'MotogpBundle:Default:images.html.twig',
                [
                    'gallery' => $gallery,
                    'circuits' => $circuits,
         //           'galleries' => $galleries,
                ]
            );
        }
        else
            throw new \Symfony\Component\Security\Core\Exception\AccessDeniedException();

    }
    
}
