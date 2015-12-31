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

        if ($musicien == null){
            throw $this->createNotFoundException("Le musicien n'existe pas.");
        }

        // composed
        $composers = $this->getDoctrine()->getRepository('IUTCatalogBundle:Composer')->findBy(array('codeMusicien' => $musicien));
        $oeuvres = $this->getDoctrine()->getRepository('IUTCatalogBundle:Oeuvre')->findBy(array('codeOeuvre' => $composers));

       /* // albums containing records composed by this musician

        $compositionOeuvre = $this->getDoctrine()->getRepository('IUTCatalogBundle:CompositionOeuvre')
            ->findBy(array('codeOeuvre' => $oeuvres));
        $composition = $this->getDoctrine()->getRepository('IUTCatalogBundle:Composition')
            ->findBy(array('codeComposition' =>        $compositionOeuvre));
        $enregistrementsComposed = $this->getDoctrine()->getRepository('IUTCatalogBundle:Enregistrement')
            ->findBy(array              ('codeComposition' => $composition));
        $compositionDisque = $this->getDoctrine()->getRepository('IUTCatalogBundle:CompositionDisque')
            ->findBy(array('codeEnregistrement' => $enregistrementsComposed));
        $disques = $this->getDoctrine()->getRepository('IUTCatalogBundle:Disque')
            ->findBy(array('codeDisque' => $compositionDisque));
        $albums = $this->getDoctrine()->getRepository('IUTCatalogBundle:Album')
            ->findBy(array('codeAlbum' => $disques));

        // interpreted
        $interpreter = $this->getDoctrine()->getRepository('IUTCatalogBundle:Interpreter')
            ->findBy(array('codeMusicien' => $musicien));
        $enregistrements = $this->getDoctrine()->getRepository('IUTCatalogBundle:Enregistrement')
            ->findBy(array('codeEnregistrement' => $interpreter));*/

        // Orchestres

        $direction = $this->getDoctrine()->getRepository('IUTCatalogBundle:Direction')
            ->findBy(array('codeMusicien' => $musicien));
        $orchestres = $this->getDoctrine()->getRepository('IUTCatalogBundle:Orchestres')
            ->findBy(array('codeOrchestre' => $direction));


        return $this->render('IUTCatalogBundle:musicien:details.html.twig', array(
            'musicien' => $musicien,
            'oeuvres' => $oeuvres,
           // 'enregistrements' => $enregistrements,
            //'albums' => $albums,
            'orchestres' => $orchestres,
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

    public function composersAction() {
        $musiciens = $this->getDoctrine()->getRepository('IUTCatalogBundle:Musicien')->findAll();
        $composers = array();

        foreach ($musiciens as $musicien) {
            $composer = null;
            $composer = $this->getDoctrine()->getRepository('IUTCatalogBundle:Composer')->findBy(array('codeMusicien' => $musicien));

            // Checking if the musician is a composer. If so, we add him to the list.
            if ($composer != null)
                $composers[] = $musicien;
        }

        return $this->render('IUTCatalogBundle:musicien:composers.html.twig', array('composers' => $composers));

    }

    public function interpretesAction() {
        $musiciens = $this->getDoctrine()->getRepository('IUTCatalogBundle:Musicien')->findAll();
        $interpretes = array();

        foreach ($musiciens as $musicien) {
            $interprete = null;
            $interprete = $this->getDoctrine()->getRepository('IUTCatalogBundle:Interpreter')->findBy(array('codeMusicien' => $musicien));

            if ($interprete != null) {
                $interpretes[] = $musicien;
            }

        }

        return $this->render('IUTCatalogBundle:musicien:interpretes.html.twig', array('interpretes' => $interpretes));

    }
/*
    public function chefsOrchestreAction() {
        $musiciens = $this->getDoctrine()->getRepository('IUTCatalogBundle:Musicien')->findAll();
        $chefsOrchestre = array();

        foreach ($musiciens as $musicien) {
            $chefOrchestre = null;
            $chefOrchestre = $this->getDoctrine()->getRepository('IUTCatalogBundle:Direction')->findBy(array('codeMusicien' => $musicien));


            if ($chefOrchestre != null)
                $chefsOrchestre[] = $musicien;
        }

        return $this->render('IUTCatalogBundle:musicien:chefsOrchestre.html.twig', array('chefsOrchestre' => $chefsOrchestre));

    }*/
}
