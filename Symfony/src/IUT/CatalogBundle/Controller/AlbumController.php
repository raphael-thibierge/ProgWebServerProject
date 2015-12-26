<?php

namespace IUT\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AlbumController extends Controller
{
    public function indexAction(){
        $album = $this->getDoctrine()->getRepository('IUTCatalogBundle:Album')->find(2);

        return $this->render('IUTCatalogBundle::albumIndex.html.twig', array(
            'album' => $album,
        ));
    }

    public function showAction($id){
        $album = null;
        return $this->render('IUTCatalogBundle:album:details.html.twig', array(
            'album' => $album,
        ));
    }

}
