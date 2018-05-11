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
use MotogpBundle\Entity\Season;


use Symfony\Component\HttpFoundation\Request;


class PublicController extends Controller
{

    private function getMainTeam($modality = null) {

        $em = $this->getDoctrine()->getManager();
        $team  = $em->getRepository(RiderTeam::class)->findMain();

        return $team;
    }


    private function getGeneralScore($modality) {
        
        
        $em = $this->getDoctrine()->getManager();

        $currentSeason = $em->getRepository(Season::class)->findOneBy(array('current' => true));

        $scores = [];
        $riders = [];


        foreach ($currentSeason->getRaces() as $cr) {
            foreach ($cr->getScores() as $score) {


                if ($cr->getModality()->getId() != $modality->getId())
                    continue;

                $id = (string)$score->getRider()->getId();

                $riders[$score->getRider()->getId()] = $score->getRider();

                if (isset($scores[$id])) {
                    $scores[$id] += $score->getScore();
                } else {
                    $scores[$id] = $score->getScore();
                }
            }
        }

        uasort($scores, function($a, $b) {
            return $a < $b;
        });


        $data = [];
        $index = 0;
        $insertedIds = [];

        foreach ($scores as $rider => $score) {
            $d = new \stdClass();
            $d->rider = $riders[$rider];
            $d->score = $score;
            $d->index = $index + 1;
            $data[] = $d;
            if ($index <= 11 && $d->rider->getRiderTeam()->isMain()) {
                $insertedIds = [$d->rider->getId()];
            }

            $index++;
        }


        $reverseIndex = 11;


        if (count($data) > 12) {

            $reverse = array();
            $reverse = array_reverse($data);

            foreach ($reverse as $index => $d) {
                if ($d->rider->getRiderTeam()->isMain() && !in_array($d->rider->getId(), $insertedIds)) {
                    $d->missing = true;
                    $data[$reverseIndex] = $d;
                    $reverseIndex--;
                }
            }
        }

        return $data;

    }


    private function getGeneralScoreTeams($modality) {
        $em = $this->getDoctrine()->getManager();

        $currentSeason = $em->getRepository(Season::class)->findOneBy(array('current' => true));

        $scores = [];
        $teams = [];

        foreach ($currentSeason->getRaces() as $cr) {
            foreach ($cr->getScores() as $score) {

                if ($cr->getModality()->getId() != $modality->getId())
                    continue;

                $id = (string)$score->getRider()->getRiderTeam()->getId();

                $teams[$score->getRider()->getRiderTeam()->getId()] = $score->getRider()->getRiderTeam();

                if (isset($scores[$id])) {
                    $scores[$id] += $score->getScore();
                } else {
                    $scores[$id] = $score->getScore();
                }
            }
        }

        uasort($scores, function($a, $b) {
            return $a < $b;
        });


        $data = [];


        foreach ($scores as $team => $score) {
            $d = new \stdClass();
            $d->team = $teams[$team];
            $d->score = $score;

            $data[] = $d;
        }

        return $data;
    }
        

    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {

        $modalitySlug = $request->get('modality');

        if (!$modalitySlug) {
            return $this->render(
                'MotogpBundle:Default:general_index.html.twig',
                [
                    'team' => $this->getMainTeam()
                ]
            );
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


        $generalScore = $this->getGeneralScore($modality);
        $teamScore = $this->getGeneralScoreTeams($modality);



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
                'generalScore' => $generalScore,
                'teamScore' => $teamScore,
                'team' => $this->getMainTeam()
            ]
        );


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

    /**
     * @Route("/pilotos")
     */
    public function ridersAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $modalitySlug = $request->get('modality');

        $modality = $em->getRepository(Modality::class)->findOneBySlug($modalitySlug);

        $gallery  = $em->getRepository(Gallery::class)->findOneBySlug('riders_'.str_replace('-', '_',  $modalitySlug));

        $galleries  = $em->getRepository(Gallery::class)->findAll();

        $rider = $em->getRepository(Rider::class)->findOneBySlug($request->get('slug'));

        $homeRiders = $em->getRepository(Rider::class)->getHomeRidersInModality($modality);
        

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



    /**
     * @Route("/pilotos")
     */
    public function sponsorAction(Request $request)
    {

        $modalitySlug = $request->get('modality');

        $em = $this->getDoctrine()->getManager();

        $modality = $em->getRepository(Modality::class)->findOneBySlug($modalitySlug);

        $homeRiders = $em->getRepository(Rider::class)->getHomeRidersInModality($modality);

        $sponsor = $em->getRepository(Sponsor::class)->findOneBySlug($request->get('slug'));


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

        $gallery  = $em->getRepository(Gallery::class)->findOneBySlug('sponsor_'.str_replace('-', '_',  $modalitySlug));


        return $this->render(
            'MotogpBundle:Default:Sponsor/sponsor.html.twig',
            [
                'team' => $this->getMainTeam(),
                'colorSponsors' => $colorSponsors,
                'gallery' => $gallery,
                'bnSponsors' => $bnSponsors,
                'riders' => $homeRiders,
                'modality' => $modality
            ]
        );


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


    /**
     * @Route("/post")
     */
    public function postAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $locale = $request->get('_locale');


        $modalitySlug = $request->get('modality');

        $modality = $em->getRepository(Modality::class)->findOneBySlug($modalitySlug);

        $homeRiders = $em->getRepository(Rider::class)->getHomeRidersInModality($modality);

        $post = $locale == 'es'
            ? $em->getRepository(Post::class)->findOneBySlug($request->get('slug'))
            : $em->getRepository(Post::class)->findOneBySlugEN($request->get('slug'));


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


    /**
     * @Route("/cookies")
     */
    public function cookiesAction(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $modalitySlug = $request->get('modality');

        $modality = $em->getRepository(Modality::class)->findOneBySlug($modalitySlug);

        $homeRiders = $em->getRepository(Rider::class)->getHomeRidersInModality($modality);



        return $this->render(
            'MotogpBundle:StaticContent:cookies.html.twig',
            [
                'team' => $this->getMainTeam(),
                'riders' => $homeRiders,
                'modality' => $modality
            ]
        );


    }

    /**
     * @Route("/privacy")
     */
    public function privacyAction(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $modalitySlug = $request->get('modality');

        $modality = $em->getRepository(Modality::class)->findOneBySlug($modalitySlug);

        $homeRiders = $em->getRepository(Rider::class)->getHomeRidersInModality($modality);

        return $this->render(
            'MotogpBundle:StaticContent:privacy.html.twig',
            [
                'team' => $this->getMainTeam(),
                'riders' => $homeRiders,
                'modality' => $modality
            ]
        );

    }

    /**
     * @Route("/terms")
     */
    public function termsAction(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $modalitySlug = $request->get('modality');

        $modality = $em->getRepository(Modality::class)->findOneBySlug($modalitySlug);

        $homeRiders = $em->getRepository(Rider::class)->getHomeRidersInModality($modality);


        return $this->render(
            'MotogpBundle:StaticContent:terms.html.twig',
            [
                'team' => $this->getMainTeam(),
                'riders' => $homeRiders,
                'modality' => $modality
            ]
        );
    }

}
