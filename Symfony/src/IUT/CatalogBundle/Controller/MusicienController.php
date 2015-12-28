<?php

namespace IUT\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MusicienController extends Controller
{
    public function indexAction()
    {
        return $this->listAction(1);
    }


    public function showAction($id){
        if($id < 1){
            throw $this->createNotFoundException("Le code musicien doit être positif");
        }

        $musicien = $this->getDoctrine()->getRepository('IUTCatalogBundle:Musicien')->find($id);

        // composed
        $composers = $this->getDoctrine()->getRepository('IUTCatalogBundle:Composer')->findBy(array('codeMusicien' => $musicien));
        $oeuvres = $this->getDoctrine()->getRepository('IUTCatalogBundle:Oeuvre')->findBy(array('codeOeuvre' => $composers));

        // interpreted
        $interpreter = $this->getDoctrine()->getRepository('IUTCatalogBundle:Interpreter')->findBy(array('codeMusicien' => $musicien));
        $enregistrements = $this->getDoctrine()->getRepository('IUTCatalogBundle:Enregistrement')->findBy(array('codeEnregistrement' => $interpreter));

        if ($musicien === null){
            throw $this->createNotFoundException("Le musicien n'existe pas");
        }



        return $this->render('IUTCatalogBundle:musicien:details.html.twig', array(
            'musicien' => $musicien,
            'oeuvres' => $oeuvres,
            'enregistrements' => $enregistrements,
        ));
    }


    public function listAction($page){


        if($page < 1){
            throw $this->createNotFoundException("La page ".$page." n'existe pas.");
        }

        $nbParPage = 50;

        $musiciens = $this->getDoctrine()->getRepository('IUTCatalogBundle:Musicien')->getMusiciens($page,$nbParPage);

        $nbPages = ceil(count($musiciens)/$nbParPage);

        if($page > $nbParPage){
            throw $this->createNotFoundException("La page ".$page." n'existe pas.");
        }

        return $this->render('IUTCatalogBundle:musicien:index.html.twig', array(
            'musiciens' => $musiciens->getQuery()->getResult(),
            'nbPages' => $nbPages,
            'page' => $page
        ));

    }

}
