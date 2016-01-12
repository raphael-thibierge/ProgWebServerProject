<?php

namespace IUT\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CartController extends Controller
{

    public function showAction(){

        return $this->render('IUTUserBundle::cartDetails.html.twig');
    }

}
