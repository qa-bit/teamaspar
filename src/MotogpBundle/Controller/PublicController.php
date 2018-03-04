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
use Symfony\Component\HttpFoundation\Request;


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
                'MotogpBundle:Default:Images/images.html.twig',
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

    /**
     * @Route("/videos")
     */
    public function videosAction()
    {

        $em = $this->getDoctrine()->getManager();

        $gallery  = $em->getRepository(Gallery::class)->findOneBySlug('videos_moto_gp');
        
        $videos = $em->getRepository(Video::class)->findAll();


        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render(
                'MotogpBundle:Default:Videos/videos.html.twig',
                [
                    'gallery' => $gallery,
                    'videos' => $videos,
                ]
            );
        }
        else
            throw new \Symfony\Component\Security\Core\Exception\AccessDeniedException();

    }

    /**
     * @Route("/motos")
     */
    public function motosAction()
    {

        $em = $this->getDoctrine()->getManager();

        $gallery  = $em->getRepository(Gallery::class)->findOneBySlug('motos_moto_gp');


        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render(
                'MotogpBundle:Default:Motos/motos.html.twig',
                [
                    'gallery' => $gallery,
                ]
            );
        }
        else
            throw new \Symfony\Component\Security\Core\Exception\AccessDeniedException();

    }

    /**
     * @Route("/pilotos")
     */
    public function ridersAction()
    {

        $em = $this->getDoctrine()->getManager();

        $gallery  = $em->getRepository(Gallery::class)->findOneBySlug('riders_moto_gp');

        $riders = $em->getRepository(Rider::class)->findHomeRiders();


        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render(
                'MotogpBundle:Default:Riders/riders.html.twig',
                [
                    'gallery' => $gallery,
                    'riders' => $riders

                ]
            );
        }
        else
            throw new \Symfony\Component\Security\Core\Exception\AccessDeniedException();

    }

    /**
     * @Route("/sponsor")
     */
    public function sponsorAction() {

        $em = $this->getDoctrine()->getManager();

        $gallery  = $em->getRepository(Gallery::class)->findOneBySlug('sponsor_moto_gp');


        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render(
                'MotogpBundle:Default:Sponsor/sponsor.html.twig',
                [
                    'gallery' => $gallery
                ]
            );
        }
        else
            throw new \Symfony\Component\Security\Core\Exception\AccessDeniedException();

    }


    /**
     * @Route("/posts")
     */
    public function postsAction()
    {

        $em = $this->getDoctrine()->getManager();

        $gallery  = $em->getRepository(Gallery::class)->findOneBySlug('noticias_moto_gp');

        // $galleries = $em->getRepository(Gallery::class)->getGalleries();

        $circuits = $em->getRepository(Circuit::class)->findAll();


        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render(
                'MotogpBundle:Default:Posts/posts.html.twig',
                [
                    'gallery' => $gallery,
                    'circuits' => $circuits
                ]
            );
        }
        else
            throw new \Symfony\Component\Security\Core\Exception\AccessDeniedException();

    }


    /**
     * @Route("/post")
     */
    public function postAction(Request $request, Post $post)
    {

        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render(
                'MotogpBundle:Default:Posts/post.html.twig',
                [
                    'post' => $post
                ]
            );
        }
        else
            throw new \Symfony\Component\Security\Core\Exception\AccessDeniedException();

    }
    
}
