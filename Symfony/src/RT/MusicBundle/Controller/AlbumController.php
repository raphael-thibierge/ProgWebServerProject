<?php

namespace RT\MusicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AlbumController extends Controller
{
    public function indexAction(){
        $album = $this->getDoctrine()->getRepository('RTMusicBundle:Album')->find(2);

        return $this->render('RTMusicBundle::albumIndex.html.twig', array(
            'album' => $album,
        ));
    }

    public function showAction($id){
        $album = null;
        return $this->render('RTMusicBundle:album:details.html.twig', array(
            'album' => $album,
        ));
    }

}
