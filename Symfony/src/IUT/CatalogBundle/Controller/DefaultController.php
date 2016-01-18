<?php

namespace IUT\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{


    public function testAction(Request $request){

        // form to edit the user account
        // not finished


        $user = $this->get('security.context')->getToken()->getUser();

        $user = $this->getDoctrine()->getRepository('IUTCatalogBundle:Abonne')->findOneBy(array(
            'codeAbonne'    =>  $user->getCodeAbonne(),
        ));

        $form = $form = $this->get('form.factory')->createBuilder('form', $user)
            ->add('prenomAbonne', 'text')
            ->add('nomAbonne', 'text')
            ->add('username', 'text')
            ->add('email', 'email')
            ->add('credit', 'text')
            ->add('submit', 'submit')
            ->getForm();


        $form->handleRequest($request);
        if($form->isValid())
        {
            // Mise à jour des données
            $this->getDoctrine()->getManager()->persist($user);
            $this->getDoctrine()->getManager()->flush();

            // Renvoi vers une autre url
            $router = $this->container->get('router');
            return $this->redirect($router->generate("r_tapp_homepage"));
        }


        return $this->render('IUTCatalogBundle::test.html.twig', array(
            'form' => $form->createView()
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
            case 'Instrument' : $content = $entity->getImage(); break;
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

    public function generateTrackAction($id) {
        $entity = $this->getDoctrine()
            ->getRepository('IUTCatalogBundle:Enregistrement')
            ->find($id);

        $content = $entity->getExtrait();

        $track = stream_get_contents($content);
        $track = pack("H*", $track);

        $response = new \Symfony\Component\HttpFoundation\Response();
        $response->headers->set('Content-type', 'audio/mpeg');
        $response->headers->set('Content-Transfer-Encoding', 'binary');
        $response->setContent($track);

        return $response;
    }


}
