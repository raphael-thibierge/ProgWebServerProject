<?php

namespace IUT\appBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexRedirectedAction(){
        return $this->redirect($this->generateUrl('r_tapp_homepage'));
    }

    public function indexAction()
    {

        $nbAlbums = $this->getDoctrine()->getRepository('IUTCatalogBundle:Album')->getNb();
        $nbMusicians = $this->getDoctrine()->getRepository('IUTCatalogBundle:Musicien')->getNb();
        $nbArtWorks = $this->getDoctrine()->getRepository('IUTCatalogBundle:Oeuvre')->getNb();

        return $this->render('IUTappBundle:Default:index.html.twig', array(
            'nbAlbums'      => $nbAlbums,
            'nbMusicians'   => $nbMusicians,
            'nbArtWorks'     => $nbArtWorks,
        ));
    }

    public function aboutAction()
    {
        return $this->render('IUTappBundle:Default:about.html.twig');
    }

    public function testAction(){
        return $this->render('IUTappBundle::test.html.twig');
    }
}
