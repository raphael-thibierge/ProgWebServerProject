<?php

namespace IUT\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{


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
        $entity = $this->getDoctrine()
            ->getRepository('IUTCatalogBundle:'.$class)
            ->find($id);


        $content = null;

        switch ($class){
            case 'Musicien' : $content = $entity->getImage(); break;
            case 'Album' : $content = $entity->getPochette(); break;
            default: break;
        }

        $image = stream_get_contents($content);
        $image = pack("H*", $image);
        $response = new \Symfony\Component\HttpFoundation\Response();
        $response->headers->set('Content-type', 'image/jpeg');
        $response->headers->set('Content-Transfer-Encoding', 'binary');
        $response->setContent($image);
        return $response;
    }


}
