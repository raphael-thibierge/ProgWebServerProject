<?php

namespace IUT\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OeuvreController extends Controller
{
    public function indexAction(){
        return $this->listAction('A');
    }

    public function listAction($letter){
        $oeuvres = $this->getDoctrine()->getRepository('IUTCatalogBundle:Oeuvre')
            ->getOeuvreList($letter);

        return $this->render('IUTCatalogBundle:oeuvre:index.html.twig', array(
            'oeuvres' => $oeuvres,
            'letter' => $letter,
        ));
    }


    public function showAction($id){
        // id verification
        if($id < 1){
            throw $this->createNotFoundException("Le code oeuvre doit être positif");
        }
        // get oeuvre
        $oeuvre = $this->getDoctrine()->getRepository('IUTCatalogBundle:Oeuvre')->find($id);
        // throw exception if not any oeuvre is found
        if ($oeuvre === null){
            throw $this->createNotFoundException("L'oeuvre n'existe pas");
        }

        //$compositionOeuvre = $this->getDoctrine()->getRepository()




        return $this->render('IUTCatalogBundle:oeuvre:details.html.twig', array(
            'oeuvre' => $oeuvre,
        ));
    }

}
