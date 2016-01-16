<?php

namespace IUT\UserBundle\Controller;

use IUT\CatalogBundle\Entity\Acheter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class CartController extends Controller
{

    public function showAction(){

        $session = $this->getRequest()->getSession();
        $price = 0;
        $nbItems = 0;

        if ($session != null && $session->has('cart')) {
            $sessionCart = $session->get('cart');

            $records = array();
            foreach($sessionCart as $cartItem){
                $record = $this->getDoctrine()->getRepository('IUTCatalogBundle:Enregistrement')
                    ->findOneBy(array('codeEnregistrement' => $cartItem));
                $records[] = $record;
                $price += $record->getPrix();
                $nbItems += 1;
            }

        } else {
            $records = null;
        }


        return $this->render('IUTUserBundle::cartDetails.html.twig', array(
            'records'   =>  $records,
            'cart'      =>  $sessionCart,
            'price'     =>  $price,
            'nbItems'   =>  $nbItems,

        ));
    }

    public function pushToCartAction($idRecord)
    {

        if ($this->getDoctrine()->getRepository('IUTCatalogBundle:Enregistrement')
                ->findOneBy(array('codeEnregistrement' => $idRecord)) !== null
        ) {

            $session = $this->getRequest()->getSession();
            if ($session == null) {
                $session = new Session();
                $session->start();
            }

            if (!$session->has('cart')) {
                $session->set('cart', array());
            }

            $cart = $session->get('cart');
            $cart[] = $idRecord;
            $cart = $session->set('cart', array_unique($cart));
        }

        return $this->redirect($this->generateUrl('cart_details'));
    }


    public function removeFromCartAction($idRecord){

        $session = $this->getRequest()->getSession();
        if ($session != null && $session->has('cart')) {
            $sessionCart = $session->get('cart');
            $newCart = array();
            foreach($sessionCart as $cartItem){
                if ($cartItem != $idRecord){
                    $newCart[] = $cartItem;
                }
            }
            $session->set('cart', $newCart);
        }

        return $this->redirect($this->generateUrl('cart_details'));
    }

    public function payCartAction(){
        $session = $this->getRequest()->getSession();
        if ($session != null && $session->has('cart')) {
            $sessionCart = $session->get('cart');

            $records = array();
            foreach($sessionCart as $cartItem){
                $record = $this->getDoctrine()->getRepository('IUTCatalogBundle:Enregistrement')
                    ->findOneBy(array('codeEnregistrement' => $cartItem));


                if ($record != null){

                    $user = $this->get('security.context')->getToken()->getUser();
                    $purchase = $this->getDoctrine()->getRepository('IUTCatalogBundle:Acheter')
                        ->findOneBy(array(
                            'codeEnregistrement'    =>  $record,
                            'codeAbonne'            =>  $user,
                        ));

                    if ($purchase == null){
                        $purchase = new Acheter();

                        $purchase->setCodeEnregistrement($record);
                        $purchase->setCodeAbonne($user);
                        $this->getDoctrine()->getManager()->persist($purchase);
                        $this->getDoctrine()->getManager()->flush();
                    }
                }
            }
            $session->set('cart', array());

        }
        return $this->redirect($this->generateUrl('cart_details'));
    }

    public function showPurchasesAction(){
        $user = $this->get('security.context')->getToken()->getUser();
        $purchases = $this->getDoctrine()->getRepository('IUTCatalogBundle:Acheter')->findBy(array(
            'codeAbonne' => $user,
        ));
        $records = $this->getDoctrine()->getRepository('IUTCatalogBundle:Enregistrement')->findBy(array(
            'codeEnregistrement'    => $purchases
        ));
        return $this->render('IUTUserBundle::purchasesDetails.html.twig', array(
            'purchases'   =>  $purchases,
            'nbItems'    =>  count($purchases),

        ));
    }

    public function cleanCartAction(){

        $session = $this->getRequest()->getSession();
        if ($session != null) {
            if ($session->has('cart')) {
                $session->set('cart', array());
            }
        }

        return $this->redirect($this->generateUrl('cart_details'));
    }



}
