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
use MotogpBundle\Entity\RiderTeam;
use MotogpBundle\Entity\Team;
use MotogpBundle\Entity\TeamCategory;


use Symfony\Component\HttpFoundation\Request;


class PublicController extends Controller
{

    private function getMainTeam($modality = null) {

        $em = $this->getDoctrine()->getManager();
        $team  = $em->getRepository(RiderTeam::class)->findMain();

        return $team;
    }




    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {

        $modalitySlug = $request->get('modality');

        if (!$modalitySlug) {
            return $this->redirectToRoute('index', array('locale' => 'es', 'modality' => 'moto-gp'), 301);
        }

        $em = $this->getDoctrine()->getManager();

        $modality = $em->getRepository(Modality::class)->findOneBySlug($modalitySlug);

        $gallery  = $em->getRepository(Gallery::class)->findOneBySlug('inicio_'.str_replace('-', '_',  $modalitySlug));

        $galleries = $em->getRepository(Gallery::class)->getGalleries();

        $posts  = $em->getRepository(Post::class)->getLastInModality($modality);

        $video = $em->getRepository(Video::class)->getLastInModality($modality);

        $scores = $em->getRepository(Score::class)->getLastByModality($modality);

        $homeRiders = $em->getRepository(Rider::class)->getHomeRidersInModality($modality);

        $colorSponsors = $em->getRepository(Sponsor::class)->getColorByModality($modality);

        $bnSponsors = $em->getRepository(Sponsor::class)->getBNByModality($modality);



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
                    'riders' => $homeRiders,
                    'bnSponsors' => $bnSponsors,
                    'colorSponsors' => $colorSponsors,
                    'modality' => $modality,
                    'team' => $this->getMainTeam()
                ]
            );
        }
        else
            throw new \Symfony\Component\Security\Core\Exception\AccessDeniedException();

    }


    /**
     * @Route("/images")
     */
    public function imagesAction(Request $request)
    {

        $modalitySlug = $request->get('modality');

        $em = $this->getDoctrine()->getManager();

        $modality = $em->getRepository(Modality::class)->findOneBySlug($modalitySlug);

        $homeRiders = $em->getRepository(Rider::class)->getHomeRidersInModality($modality);

        $gallery  = $em->getRepository(Gallery::class)->findOneBySlug('imagenes_'.str_replace('-', '_',  $modalitySlug));

        $circuits = $em->getRepository(Circuit::class)->getCircuitsWithGalleryInModality($modality);


        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render(
                'MotogpBundle:Default:Images/images.html.twig',
                [
                    'gallery' => $gallery,
                    'circuits' => $circuits,
                    'riders' => $homeRiders,
                    'modality' => $modality,
                    'team' => $this->getMainTeam()
                ]
            );
        }
        else
            throw new \Symfony\Component\Security\Core\Exception\AccessDeniedException();

    }

    /**
     * @Route("/videos")
     */
    public function videosAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $modalitySlug = $request->get('modality');

        $modality = $em->getRepository(Modality::class)->findOneBySlug($modalitySlug);

        $gallery  = $em->getRepository(Gallery::class)->findOneBySlug('videos_'.str_replace('-', '_',  $modalitySlug));
        
        $videos = $em->getRepository(Video::class)->getAllInModality($modality);

        $homeRiders = $em->getRepository(Rider::class)->getHomeRidersInModality($modality);



        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render(
                'MotogpBundle:Default:Videos/videos.html.twig',
                [
                    'gallery' => $gallery,
                    'videos' => $videos,
                    'riders' => $homeRiders,
                    'modality' => $modality,
                    'team' => $this->getMainTeam()
                ]
            );
        }
        else
            throw new \Symfony\Component\Security\Core\Exception\AccessDeniedException();

    }

    /**
     * @Route("/motos")
     */
    public function motosAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $modalitySlug = $request->get('modality');

        $modality = $em->getRepository(Modality::class)->findOneBySlug($modalitySlug);

        $gallery  = $em->getRepository(Gallery::class)->findOneBySlug('motos_'.str_replace('-', '_',  $modalitySlug));

        $homeRiders = $em->getRepository(Rider::class)->getHomeRidersInModality($modality);


        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render(
                'MotogpBundle:Default:Motos/motos.html.twig',
                [
                    'gallery' => $gallery,
                    'riders' => $homeRiders,
                    'modality' => $modality,
                    'team' => $this->getMainTeam()
                ]
            );
        }
        else
            throw new \Symfony\Component\Security\Core\Exception\AccessDeniedException();

    }

    /**
     * @Route("/pilotos")
     */
    public function ridersAction(Request $request, Rider $rider)
    {

        $em = $this->getDoctrine()->getManager();

        $modalitySlug = $request->get('modality');

        $modality = $em->getRepository(Modality::class)->findOneBySlug($modalitySlug);

        $gallery  = $em->getRepository(Gallery::class)->findOneBySlug('riders_'.str_replace('-', '_',  $modalitySlug));

        $galleries  = $em->getRepository(Gallery::class)->findAll();

        $homeRiders = $em->getRepository(Rider::class)->getHomeRidersInModality($modality);



        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render(
                'MotogpBundle:Default:Riders/riders.html.twig',
                [
                    'gallery' => $gallery,
                    'galleries' => $galleries,
                    'riders' => $homeRiders,
                    'rider' => $rider,
                    'modality' => $modality,
                    'team' => $this->getMainTeam()

                ]
            );
        }
        else
            throw new \Symfony\Component\Security\Core\Exception\AccessDeniedException();

    }



    /**
     * @Route("/pilotos")
     */
    public function sponsorAction(Request $request, Sponsor $sponsor)
    {

        $modalitySlug = $request->get('modality');

        $em = $this->getDoctrine()->getManager();

        $modality = $em->getRepository(Modality::class)->findOneBySlug($modalitySlug);

        $homeRiders = $em->getRepository(Rider::class)->getHomeRidersInModality($modality);


        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render(
                'MotogpBundle:Default:Sponsor/sponsor_landpage.html.twig',
                [
                    'sponsor' => $sponsor,
                    'riders' => $homeRiders,
                    'modality' => $modality,
                    'team' => $this->getMainTeam()

                ]
            );
        }
        else
            throw new \Symfony\Component\Security\Core\Exception\AccessDeniedException();

    }

    /**
     * @Route("/sponsors")
     */
    public function sponsorsAction(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $modalitySlug = $request->get('modality');

        $modality = $em->getRepository(Modality::class)->findOneBySlug($modalitySlug);

        $homeRiders = $em->getRepository(Rider::class)->getHomeRidersInModality($modality);

        $colorSponsors = $em->getRepository(Sponsor::class)->getColorByModality($modality);

        $bnSponsors = $em->getRepository(Sponsor::class)->getBNByModality($modality);


        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render(
                'MotogpBundle:Default:Sponsor/sponsor.html.twig',
                [
                    'team' => $this->getMainTeam(),
                    'colorSponsors' => $colorSponsors,
                    'bnSponsors' => $bnSponsors,
                    'riders' => $homeRiders,
                    'modality' => $modality
                ]
            );
        }
        else
            throw new \Symfony\Component\Security\Core\Exception\AccessDeniedException();

    }


    /**
     * @Route("/posts")
     */
    public function postsAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $modalitySlug = $request->get('modality');

        $modality = $em->getRepository(Modality::class)->findOneBySlug($modalitySlug);

        $gallery  = $em->getRepository(Gallery::class)->findOneBySlug('noticias_'.str_replace('-', '_',  $modalitySlug));

        $homeRiders = $em->getRepository(Rider::class)->getHomeRidersInModality($modality);

        $circuits = $em->getRepository(Circuit::class)->getCircuitsWithPostsInModality($modality);

        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render(
                'MotogpBundle:Default:Posts/posts.html.twig',
                [
                    'gallery' => $gallery,
                    'circuits' => $circuits,
                    'modality' => $modality,
                    'team' => $this->getMainTeam(),
                    'riders' => $homeRiders
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
        $em = $this->getDoctrine()->getManager();

        $modalitySlug = $request->get('modality');

        $modality = $em->getRepository(Modality::class)->findOneBySlug($modalitySlug);

        $homeRiders = $em->getRepository(Rider::class)->getHomeRidersInModality($modality);

        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render(
                'MotogpBundle:Default:Posts/post.html.twig',
                [
                    'post' => $post,
                    'riders' => $homeRiders,
                    'team' => $this->getMainTeam(),
                    'modality' => $modality
                ]
            );
        }
        else
            throw new \Symfony\Component\Security\Core\Exception\AccessDeniedException();

    }

    /**
     * @Route("/team_staff")
     */
    public function teamAction(Request $request)
    {


        $modalitySlug = $request->get('modality');

        $em = $this->getDoctrine()->getManager();

        $modality = $em->getRepository(Modality::class)->findOneBySlug($modalitySlug);

        $gallery  = $em->getRepository(Gallery::class)->findOneBySlug('staff_'.str_replace('-', '_',  $modalitySlug));

        $riders = $em->getRepository(Rider::class)->getHomeRidersInModality($modality);

        $staff = $em->getRepository(Team::class)->getAllInModality($modality);

        $teamCategories = $em->getRepository(TeamCategory::class)->findBy(array(), array('_order' => 'ASC'));


        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render(
                'MotogpBundle:Default:Team/team-staff.html.twig',
                [
                    'gallery' => $gallery,
                    'team' => $this->getMainTeam(),
                    'riders' => $riders,
                    'staff' => $staff,
                    'teamCategories' => $teamCategories,
                    'modality' => $modality
                ]
            );
        }
        else
            throw new \Symfony\Component\Security\Core\Exception\AccessDeniedException();

    }


    /**
     * @Route("/cookies")
     */
    public function cookiesAction(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $modalitySlug = $request->get('modality');

        $modality = $em->getRepository(Modality::class)->findOneBySlug($modalitySlug);

        $homeRiders = $em->getRepository(Rider::class)->getHomeRidersInModality($modality);


        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render(
                'MotogpBundle:Default:Cookies/cookies.html.twig',
                [
                    'team' => $this->getMainTeam(),
                    'riders' => $homeRiders,
                    'modality' => $modality
                ]
            );
        }
        else
            throw new \Symfony\Component\Security\Core\Exception\AccessDeniedException();

    }
    
}
