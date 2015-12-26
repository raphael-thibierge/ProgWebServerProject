<?php

namespace IUT\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->musiciensAction(1);
    }

    public function showMusicienAction($id){
        if($id < 1){
            throw $this->createNotFoundException("Le code musicien doit être positif");
        }

        $musicien = $this->getDoctrine()->getRepository('IUTCatalogBundle:Musicien')->find($id);

        // composed
        $composers = $this->getDoctrine()->getRepository('IUTCatalogBundle:Composer')->findBy(array('codeMusicien' => $musicien));
        $oeuvres = $this->getDoctrine()->getRepository('IUTCatalogBundle:Oeuvre')->findBy(array('codeOeuvre' => $composers));

        // interpreted
        $interpreter = $this->getDoctrine()->getRepository('IUTCatalogBundle:Interpreter')->findBy(array('codeMusicien' => $musicien));
        $enregistrements = $this->getDoctrine()->getRepository('IUTCatalogBundle:Enregistrement')->findBy(array('codeEnregistrement' => $interpreter));

        if ($musicien === null){
            throw $this->createNotFoundException("Le musicien n'existe pas");
        }



        return $this->render('IUTCatalogBundle::details.html.twig', array(
            'musicien' => $musicien,
            'oeuvres' => $oeuvres,
            'enregistrement' => $enregistrements,
        ));
    }

    public function musiciensAction($page){


        if($page < 1){
            throw $this->createNotFoundException("La page ".$page." n'existe pas.");
        }

        $nbParPage = 50;

        $musiciens = $this->getDoctrine()->getRepository('IUTCatalogBundle:Musicien')->getMusiciens($page,$nbParPage);

        $nbPages = ceil(count($musiciens)/$nbParPage);

        if($page > $nbParPage){
            throw $this->createNotFoundException("La page ".$page." n'existe pas.");
        }

        return $this->render('IUTCatalogBundle::musiciens.html.twig', array(
            'musiciens' => $musiciens->getQuery()->getResult(),
            'nbPages' => $nbPages,
            'page' => $page
        ));

    }


    public function testAction(){


        $album = $this->getDoctrine()->getRepository('IUTCatalogBundle:Album')->find(15);

        $bachMusicien = $this->getDoctrine()->getRepository('IUTCatalogBundle:Musicien')->find(2);
        $bach = $this->getDoctrine()->getRepository('IUTCatalogBundle:Composer')->findBy(array('codeMusicien' => $bachMusicien));
        $oeuvres = $this->getDoctrine()->getRepository('IUTCatalogBundle:Oeuvre')->findBy(array('codeOeuvre' => $bach));



        return $this->render('IUTCatalogBundle::test.html.twig', array(
            'album' => $album,
            'oeuvres' => $oeuvres,
        ));
    }


    public function generatePictureAction($id, $class) {
        $musicien = $this->getDoctrine()
            ->getRepository('IUTCatalogBundle:'.$class)
            ->find($id);
        $image = stream_get_contents($musicien->getImage());
        $image = pack("H*", $image);
        $response = new \Symfony\Component\HttpFoundation\Response();
        $response->headers->set('Content-type', 'image/jpeg');
        $response->headers->set('Content-Transfer-Encoding', 'binary');
        $response->setContent($image);
        return $response;
    }
}
