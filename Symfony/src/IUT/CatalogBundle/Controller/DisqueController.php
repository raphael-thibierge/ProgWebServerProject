<?php

namespace IUT\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DisqueController extends Controller
{
    public function showAction($id)
    {
        $disc = $this->getDoctrine()->getRepository('IUTCatalogBundle:Disque')->find($id);

        if ($disc === null){
            throw $this->createNotFoundException("Le disque n'existe pas");
        }


        $discElements = $this->getDoctrine()->getRepository('IUTCatalogBundle:CompositionDisque')->findBy(array('codeDisque' => $disc));
        $records = $this->getDoctrine()->getRepository('IUTCatalogBundle:Enregistrement')->findBy(array('codeEnregistrement' => $discElements));


        return $this->render('IUTCatalogBundle:disque:details.html.twig', array(
            'disque' => $disc,
            'enregistrements' => $records,
        ));
    }



}
