<?php

namespace RT\appBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RTappBundle:Default:index.html.twig');
    }

    public function contactAction()
    {
        return $this->render('RTappBundle:Default:contact.html.twig');
    }

    public function testAction(){
        return $this->render('RTappBundle::test.html.twig');
    }
}
