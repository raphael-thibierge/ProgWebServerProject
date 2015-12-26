<?php

namespace IUT\appBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('IUTappBundle:Default:index.html.twig');
    }

    public function aboutAction()
    {
        return $this->render('IUTappBundle:Default:about.html.twig');
    }

    public function testAction(){
        return $this->render('IUTappBundle::test.html.twig');
    }
}
