<?php

namespace RT\MusicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->musiciensAction(1);
    }

    public function showAction($id){
        if($id < 1){
            throw $this->createNotFoundException("Le code musicien doit être positif");
        }

        $musicien = $this->getDoctrine()->getRepository('RTMusicBundle:Musicien')->find($id);
        if ($musicien == null){
            throw $this->createNotFoundException("Le musicien n'existe pas");
        }

        return $this->render('RTMusicBundle::details.html.twig', array(
            'musicien' => $musicien,
        ));
    }

    public function musiciensAction($page){


        if($page < 1){
            throw $this->createNotFoundException("La page ".$page." n'existe pas.");
        }

        $nbParPage = 50;

        $musiciens = $this->getDoctrine()->getRepository('RTMusicBundle:Musicien')->getMusiciens($page,$nbParPage);

        $nbPages = ceil(count($musiciens)/$nbParPage);

        if($page > $nbParPage){
            throw $this->createNotFoundException("La page ".$page." n'existe pas.");
        }

        return $this->render('RTMusicBundle::musiciens.html.twig', array(
            'musiciens' => $musiciens->getQuery()->getResult(),
            'nbPages' => $nbPages,
            'page' => $page
        ));
    }


    public function generatePictureAction($id, $class) {
        $musicien = $this->getDoctrine()
            ->getRepository('RTMusicBundle:'.$class)
            ->find($id);
        $image = stream_get_contents($musicien->getImage());
        $image = pack("H*", $image);
        $response = new \Symfony\Component\HttpFoundation\Response();
        $response->headers->set('Content-type', 'image/jpeg');
        $response->headers->set('Content-Transfer-Encoding', 'binary');
        $response->setContent($image);
        return $response;
    }
}
