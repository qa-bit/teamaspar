<?php

namespace MotogpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MotogpBundle\Entity\Gallery;
use MotogpBundle\Entity\Post;
use MotogpBundle\Entity\Modality;
use MotogpBundle\Entity\Score;
use MotogpBundle\Entity\Video;

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

        
        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render(
                'MotogpBundle:Default:index.html.twig',
                [
                    'index_gallery' => $gallery,
                    'galleries' => $galleries,
                    'posts' => $posts,
                    'video' => $video,
                    'scores' => $scores
                ]
            );
        }
        else
            throw new \Symfony\Component\Security\Core\Exception\AccessDeniedException();

    }
}
