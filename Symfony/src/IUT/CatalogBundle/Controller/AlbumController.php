<?php

namespace IUT\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AlbumController extends Controller
{
    public function indexAction(){
        return $this->listAction('A');
    }

    public function listAction($letter){
        $albums = $this->getDoctrine()->getRepository('IUTCatalogBundle:Album')
            ->getAlbumList($letter);
        //->findByTitreAlbum(array('A%'));

        return $this->render('IUTCatalogBundle:album:index.html.twig', array(
            'albums' => $albums,
            'letter' => $letter,
        ));
    }

    public function showAction($id){
        $album = $this->getDoctrine()->getRepository('IUTCatalogBundle:Album')->find($id);

        if ($album === null){
            throw $this->createNotFoundException("L'album d'identifiant " . $id . " n'existe pas");
        }



        // disc list
        $discList = $this->getDoctrine()->getRepository('IUTCatalogBundle:Disque')->findBy(array('codeAlbum' => $album));
        $discsWithRecords = array();

        foreach ($discList as $disc){
            // get disc records
            $discElements = $this->getDoctrine()->getRepository('IUTCatalogBundle:CompositionDisque')
                ->findBy(array('codeDisque' => $disc));
            $records = $this->getDoctrine()->getRepository('IUTCatalogBundle:Enregistrement')
                ->findBy(array('codeEnregistrement' => $discElements));

/*
             // doesn't work
            $recordsWithTracks = array();
            foreach ($records as $record) {
                $codeRecord = $record->getCodeEnregistrement();
                $track = $this->getDoctrine()->getRepository('IUTCatalogBundle:Extraits')->find($codeRecord);
                $recordsWithTracks[$codeRecord] = $track;
            }
*/
            $discsWithRecords[] = array(
                "disc" => $disc,
                "records" => $records
            );
        }



        return $this->render('IUTCatalogBundle:album:details.html.twig', array(
            'album' => $album,
            'disques' => $discsWithRecords,
            //'recordsWithTracks' => $recordsWithTracks
        ));
    }



}
