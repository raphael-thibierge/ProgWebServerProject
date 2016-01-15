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
        $orchestra = $this->getDoctrine()->getRepository('IUTCatalogBundle:Orchestres')->find($id);

        // throw exception if not any orchestra is found
        if ($orchestra === null){
            throw $this->createNotFoundException("L'orchestre n'existe pas");
        }

        $albums = $this->getDoctrine()->getRepository('IUTCatalogBundle:Album')->getAlbumsByOrchestra($orchestra);
        $chiefsOrchestra = $this->getDoctrine()->getRepository('IUTCatalogBundle:Musicien')->getChiefsByOrchestra($orchestra);


        return $this->render('IUTCatalogBundle:orchestre:details.html.twig', array(
            'orchestra'     =>  $orchestra,
            'albums'        =>  $albums,
            'chiefsOrchestra' => $chiefsOrchestra,
            'chefOrchestre' =>  null,
        ));
    }
}
