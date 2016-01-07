<?php

namespace IUT\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InstrumentController extends Controller
{
    public function indexAction(){
        // get orchestras list
        $orchestres = $this->getDoctrine()->getRepository('IUTCatalogBundle:Orchestres')->findBy(array(), array('nomOrchestre' => 'ASC'));
        return $this->render('IUTCatalogBundle:orchestre:index.html.twig', array(
            'orchestres' => $orchestres,
        ));
    }

    public function showAction($id){
        // id verification
        if($id < 1){
            throw $this->createNotFoundException("Le code orchestre doit être positif.");
        }
        // get orchestra
        $orchestre = $this->getDoctrine()->getRepository('IUTCatalogBundle:Orchestres')->find($id);
        // throw exception if not any orchestra is found
        if ($orchestre === null){
            throw $this->createNotFoundException("L'orchestre n'existe pas");
        }


        // TODO - to finish, adding chief orchestra
        $direction = $this->getDoctrine()->getRepository('IUTCatalogBundle:Direction')->findBy(array('codeOrchestre' => $orchestre));
        $chiefOrchestra = $this->getDoctrine()->getRepository('IUTCatalogBundle:Musicien')->findBy(array('codeMusicien' => $musicien));


        return $this->render('IUTCatalogBundle:instrument:details.html.twig', array(
            'orchestre' => $orchestre,
            'chefOrchestre' => $chiefOrchestra,
        ));
    }
}
