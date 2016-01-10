<?php

namespace IUT\UserBundle\Controller;

use IUT\CatalogBundle\Entity\Abonne;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;

class SecurityController extends Controller
{
    public function loginAction(Request $request)
    {

        /*
         *
         * Code to use
         *
         */

        $session = $request->getSession();

        if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContextInterface::AUTHENTICATION_ERROR
            );
        }
        elseif (null !== $session && $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
            $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        }
        else {
            $error = '';
        }

        $lastUsername = (null === $session) ? '' : $session->get(SecurityContextInterface::LAST_USERNAME);


        $user = new Abonne();
        $coucou = null;
        $form = $this->get('form.factory')->createBuilder('form', $user)
            ->add('login', 'text')
            ->add('password', 'password')
            ->add('submit', 'submit')
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()){
            $coucou ='coucou';
        }



        return $this->render('IUTUserBundle::login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
            'form'          => $form->createView(),
            'user'          => $user,
            'coucou'           => $coucou,
        ));
    }

    public function signInAction(Request $request){
        $abonne = new Abonne();


        $form = $form = $this->get('form.factory')->createBuilder('form', $abonne)
            ->add('prenomAbonne', 'text')
            ->add('nomAbonne', 'text')
            ->add('login', 'text')
            ->add('password', 'password')
            ->add('submit', 'submit')
            ->getForm();


        $form->handleRequest($request);
        if($form->isValid())
        {
            // Mise à jour des données
            $this->getDoctrine()->getManager()->persist($abonne);
            $this->getDoctrine()->getManager()->flush();
            // Renvoi vers une autre url
            $router = $this->container->get('router');
            $url = $router->generate("r_tapp_homepage");
            return $this->redirect($url);
        }


            return $this->render('IUTUserBundle::signin.html.twig', array(
                'form' => $form->createView()
            ));

    }



}
