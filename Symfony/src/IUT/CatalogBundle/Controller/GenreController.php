<?php

namespace IUT\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GenreController extends Controller
{
    public function indexAction(){
        // get genre list
        $genres = $this->getDoctrine()->getRepository('IUTCatalogBundle:Genre')->findAll();
        return $this->render('IUTCatalogBundle:genre:index.html.twig', array(
            'genres' => $genres,
        ));
    }

    public function showAction($id){
        // id verification
        if($id < 1){
            throw $this->createNotFoundException("Le code genre doit être positif");
        }
        // get oeuvre
        $genre = $this->getDoctrine()->getRepository('IUTCatalogBundle:Genre')->find($id);
        // throw exception if not any genre is found
        if ($genre === null){
            throw $this->createNotFoundException("Le genre n'existe pas");
        }


        // TODO - to finish, adding albums list


        return $this->render('IUTCatalogBundle:genre:details.html.twig', array(
            'genre' => $genre,
        ));
    }

}
