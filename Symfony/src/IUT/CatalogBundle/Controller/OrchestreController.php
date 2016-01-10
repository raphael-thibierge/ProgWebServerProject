<?php

namespace IUT\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OrchestreController extends Controller
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

        $codeOrchestre = $orchestre->getCodeOrchestre();

        // adding chief orchestra
        $direction = $this->getDoctrine()->getRepository('IUTCatalogBundle:Direction')
            ->findOneBy(array('codeOrchestre' => $codeOrchestre));

        $directions = $this->getDoctrine()->getRepository('IUTCatalogBundle:Direction')
            ->findBy(array('codeOrchestre' => $codeOrchestre));

        $records = $this->getDoctrine()->getRepository('IUTCatalogBundle:Enregistrement')
            ->findBy(array('codeEnregistrement' => $directions));

       $chiefOrchestra = null;
        if ($direction != null) {
           $chiefOrchestra = $this->getDoctrine()->getRepository('IUTCatalogBundle:Musicien')
               ->findOneBy(array('codeMusicien' => $direction->getCodeMusicien()));
       }

        return $this->render('IUTCatalogBundle:orchestre:details.html.twig', array(
            'orchestre' => $orchestre,
            'direction' => $direction,
            'directions' => $directions,
            'chefOrchestre' => $chiefOrchestra,
            'enregistrements' => $records
        ));
    }
}
