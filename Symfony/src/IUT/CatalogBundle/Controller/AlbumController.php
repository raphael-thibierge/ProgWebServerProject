<?php

namespace IUT\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AlbumController extends Controller
{
    public function indexAction(){
        return $this->listAction('A');
    }

    public function listAction($letter){
        $albums = $this->getDoctrine()->getRepository('IUTCatalogBundle:Album')
            ->getAlbumList($letter);
        //->findByTitreAlbum(array('A%'));

        return $this->render('IUTCatalogBundle:album:index.html.twig', array(
            'albums' => $albums,
            'letter' => $letter,
        ));
    }

    public function showAction($id){
        $album = $this->getDoctrine()->getRepository('IUTCatalogBundle:Album')->find($id);

        if ($album === null){
            throw $this->createNotFoundException("L'album d'identifiant " . $id . " n'existe pas");
        }


        $disques = $this->getDoctrine()->getRepository('IUTCatalogBundle:Disque')->findBy(array('codeAlbum' => $album));
        //$compoitionDisque = $this->getDoctrine()->getRepository('IUTCatalogBundle:CompositionDisque')->findBy(array('codeDisque' => $disques));



        return $this->render('IUTCatalogBundle:album:details.html.twig', array(
            'album' => $album,
            'disques' => $disques,

        ));
    }



}
