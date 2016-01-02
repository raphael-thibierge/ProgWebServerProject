<?php

namespace IUT\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MusicienController extends Controller
{
    public function indexAction()
    {
        return $this->listAction('A');
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
        $composers = $this->getDoctrine()->getRepository('IUTCatalogBundle:Composer')
            ->findBy(array('codeMusicien' => $musicien));
        $oeuvres = $this->getDoctrine()->getRepository('IUTCatalogBundle:Oeuvre')
            ->findBy(array('codeOeuvre' => $composers), array('titreOeuvre' => 'ASC'));



        // albums containing records composed by this musician

        $compositionOeuvre = $this->getDoctrine()->getRepository('IUTCatalogBundle:CompositionOeuvre')
            ->findBy(array('codeOeuvre' => $oeuvres));

        //$compositionOeuvre = array_unique($compositionOeuvre, SORT_REGULAR);


      //  $composition = $this->getDoctrine()->getRepository('IUTCatalogBundle:Composition')
        //    ->findOneBy(array('codeComposition' => $compositionOeuvre));

      //  $enregistrementsComposed = $this->getDoctrine()->getRepository('IUTCatalogBundle:Enregistrement')
        //    ->findOneBy(array('codeComposition' => $compositionOeuvre));


        //$compositionDisque = $this->getDoctrine()->getRepository('IUTCatalogBundle:CompositionDisque')
          //  ->findOneBy(array('codeEnregistrement' => $enregistrementsComposed));

        //$disques = $this->getDoctrine()->getRepository('IUTCatalogBundle:Disque')
          //  ->findOneBy(array('codeDisque' => $compositionDisque));

        //$albums = $this->getDoctrine()->getRepository('IUTCatalogBundle:Album')
          //  ->findBy(array('codeAlbum' => $disques));

        // interpreted
        /*$interpreter = $this->getDoctrine()->getRepository('IUTCatalogBundle:Interpreter')
            ->findBy(array('codeMusicien' => $musicien));
        $enregistrements = $this->getDoctrine()->getRepository('IUTCatalogBundle:Enregistrement')
            ->findBy(array('codeEnregistrement' => $interpreter));*/

        // Orchestres

        $direction = $this->getDoctrine()->getRepository('IUTCatalogBundle:Direction')
            ->findBy(array('codeMusicien' => $musicien));
        $orchestres = $this->getDoctrine()->getRepository('IUTCatalogBundle:Orchestres')
            ->findBy(array('codeOrchestre' => $direction), array('nomOrchestre' => 'ASC'));


        return $this->render('IUTCatalogBundle:musicien:details.html.twig', array(
            'musicien' => $musicien,
            'oeuvres' => $oeuvres,
            'compositions' => $compositionOeuvre,
           // 'enregistrements' => $enregistrements, // est-ce pertinant d'afficher chaques enregistrement, ( liste trop longue )
            //'albums' => $albums,
            'orchestres' => $orchestres,
        ));
    }

    public function listAction($letter){

        $musiciens = $this->getDoctrine()->getRepository('IUTCatalogBundle:Musicien')->getMusiciens($letter);

        return $this->render('IUTCatalogBundle:musicien:index.html.twig', array(
            'musiciens' => $musiciens->getQuery()->getResult(),
            'letter' => $letter,
        ));

    }

    public function composersAction() {
        return $this->composersListAction('A');
    }

    public function composersListAction($letter){
        $musiciens = $this->getDoctrine()->getRepository('IUTCatalogBundle:Musicien')->getMusiciens($letter);
        $composers = array();

        foreach ($musiciens as $musicien) {
            $composer = null;
            $composer = $this->getDoctrine()->getRepository('IUTCatalogBundle:Composer')->findBy(array('codeMusicien' => $musicien));

            // Checking if the musician is a composer. If so, we add him to the list.
            if ($composer != null)
                $composers[] = $musicien;
        }

        return $this->render('IUTCatalogBundle:musicien:composers.html.twig', array(
            'composers' => $composers,
            'letter' => $letter,
        ));

    }

    public function interpretesAction() {
        return $this->interpretesListAction('A');
    }

    public function interpretesListAction($letter) {
        $musiciens = $this->getDoctrine()->getRepository('IUTCatalogBundle:Musicien')->getMusiciens($letter);
        $interpretes = array();

        foreach ($musiciens as $musicien) {
            $interprete = null;
            $interprete = $this->getDoctrine()->getRepository('IUTCatalogBundle:Interpreter')->findBy(array('codeMusicien' => $musicien));

            if ($interprete != null) {
                $interpretes[] = $musicien;
            }

        }

        return $this->render('IUTCatalogBundle:musicien:interpretes.html.twig', array(
            'interpretes' => $interpretes,
            'letter' => $letter,
        ));

    }

    public function chefsOrchestreAction() {
        return $this->chefsOrchestreListAction('A');
    }

    public function chefsOrchestreListAction($letter) {
        $musiciens = $this->getDoctrine()->getRepository('IUTCatalogBundle:Musicien')->getMusiciens($letter);
        $chefsOrchestre = array();

        foreach ($musiciens as $musicien) {
            $chefOrchestre = null;
            $chefOrchestre = $this->getDoctrine()->getRepository('IUTCatalogBundle:Direction')->findBy(array('codeMusicien' => $musicien));

            if ($chefOrchestre != null)
                $chefsOrchestre[] = $musicien;
        }

        return $this->render('IUTCatalogBundle:musicien:chefsOrchestre.html.twig', array(
            'chefsOrchestre' => $chefsOrchestre,
            'letter' => $letter,
        ));

    }
}
