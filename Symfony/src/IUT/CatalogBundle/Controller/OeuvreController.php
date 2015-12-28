<?php

namespace IUT\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OeuvreController extends Controller
{
    public function showAction($id){
        // id verification
        if($id < 1){
            throw $this->createNotFoundException("Le code oeuvre doit être positif");
        }
        // get oeuvre
        $oeuvre = $this->getDoctrine()->getRepository('IUTCatalogBundle:Oeuvre')->find($id);
        // throw exception if not any oeuvre is found
        if ($oeuvre === null){
            throw $this->createNotFoundException("Le musicien n'existe pas");
        }


    }

}
