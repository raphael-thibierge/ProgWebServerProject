<?php

namespace IUT\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InstrumentController extends Controller
{
    public function indexAction(){
        // get instrument list
        $instruments = $this->getDoctrine()->getRepository('IUTCatalogBundle:Instrument')->findAll();
        return $this->render('IUTCatalogBundle:instrument:index.html.twig', array(
            'instruments' => $instruments,
        ));
    }

    public function showAction($id){
        // id verification
        if($id < 1){
            throw $this->createNotFoundException("Le code instrument doit être positif");
        }
        // get instrument
        $instrument = $this->getDoctrine()->getRepository('IUTCatalogBundle:Instrument')->find($id);
        // throw exception if not any instrument is found
        if ($instrument === null){
            throw $this->createNotFoundException("L'instrument n'existe pas");
        }


        // TODO - to finish, adding albums list


        return $this->render('IUTCatalogBundle:instrument:details.html.twig', array(
            'instrument' => $instrument,
        ));
    }
}
