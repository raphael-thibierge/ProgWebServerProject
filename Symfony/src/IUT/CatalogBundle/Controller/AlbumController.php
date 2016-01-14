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

            $discsWithRecords[] = array(
                "disc" => $disc,
                "records" => $records
            );
        }

        // Using Amazon API

        require('AmazonECS.class.php'); //nom de la classe téléchargée
        $Aws_ID = "AKIAJGEF3AU46GYXID3A"; // Identifiant
        $Aws_SECRET = "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"; //Secret
        $associateTag="eclass06-20"; // AssociateTag
        $client = new AmazonECS($Aws_ID, $Aws_SECRET, 'FR', $associateTag);

        $asin = $album->getASIN();

        $response = $client->responseGroup('Large')->lookup($asin);

        // converts object stdclass to array
        $response = json_encode($response);
        $response = json_decode($response, true);

        $items = $response["Items"];
        $it = $items["Item"];

        return $this->render('IUTCatalogBundle:album:details.html.twig', array(
            'album' => $album,
            'disques' => $discsWithRecords,
            'it' => $it,
        ));
    }


}
