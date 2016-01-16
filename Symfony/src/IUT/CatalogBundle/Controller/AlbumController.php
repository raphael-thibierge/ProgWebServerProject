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

        $infos = array();

        // Rank
        if (array_key_exists('SalesRank',$it))
            $infos["SalesRank"] = $it["SalesRank"];
        else $infos["SalesRank"] = null;


        // Binding
        if (array_key_exists('Binding',$it))
            $infos["Binding"] = $it["Binding"];
        else $infos["Binding"] = null;

        // Label
        if (array_key_exists('Brand',$it["ItemAttributes"]))
            $infos["Brand"] = $it["ItemAttributes"]["Brand"];
        else $infos["Brand"] = null;

        // Language
        if (array_key_exists('Languages', $it["ItemAttributes"])) {
            if (array_key_exists('Language',$it["ItemAttributes"]["Languages"])) {
                if (array_key_exists('Name', $it["ItemAttributes"]["Languages"]["Language"]))
                    $infos["Language"] = $it["ItemAttributes"]["Languages"]["Language"]["Name"];
                else $infos["Language"] = null;
            }

            else $infos["Language"] = null;
        }
        else $infos["Language"] = null;

        // Creators
        if (array_key_exists('Creator', $it["ItemAttributes"])) {
            // One creator only
            if (array_key_exists('Role', $it["ItemAttributes"]["Creator"])){
                $infos["Creator"] = $it["ItemAttributes"]["Creator"];
                $infos["Creators"] = null;
            }

            // Many creators
            else {
                $infos["Creator"] = null;
                $infos["Creators"] = $it["ItemAttributes"]["Creator"];
            }
        }
        else {
            $infos["Creator"] = null;
            $infos["Creators"] = null;
        }

        // Genre
        if (array_key_exists('Genre',$it["ItemAttributes"]))
            $infos["Genre"] = $it["ItemAttributes"]["Genre"];
        else $infos["Genre"] = null;

        // Studio
        if (array_key_exists('Studio',$it["ItemAttributes"]))
            $infos["Studio"] = $it["ItemAttributes"]["Studio"];
        else $infos["Studio"] = null;

        // Production
        if (array_key_exists('ProductGroup',$it["ItemAttributes"]))
            $infos["ProductGroup"] = $it["ItemAttributes"]["ProductGroup"];
        else $infos["ProductGroup"] = null;

        // Release date
        if (array_key_exists('ReleaseDate',$it["ItemAttributes"]))
            $infos["ReleaseDate"] = $it["ItemAttributes"]["ReleaseDate"];
        else $infos["ReleaseDate"] = null;

        // Publication date
        if (array_key_exists('PublicationDate',$it["ItemAttributes"]))
            $infos["PublicationDate"] = $it["ItemAttributes"]["PublicationDate"];
        else $infos["PublicationDate"] = null;

        // Offer summary
        if (array_key_exists('OfferSummary',$it)) {

            // Lowest new price
            if (array_key_exists('LowestNewPrice', $it["OfferSummary"]))
                $infos["LowestNewPrice"] = $it["OfferSummary"]["LowestNewPrice"]["FormattedPrice"];
            else $infos["LowestNewPrice"] = null;

            // Total new
            if (array_key_exists('TotalNew', $it["OfferSummary"]))
                $infos["TotalNew"] = $it["OfferSummary"]["TotalNew"];
            else $infos["TotalNew"] = null;

            // Lowest used price
            if (array_key_exists('LowestUsedPrice', $it["OfferSummary"]))
                $infos["LowestUsedPrice"] = $it["OfferSummary"]["LowestUsedPrice"]["FormattedPrice"];
            else $infos["LowestUsedPrice"] = null;

            // Total used
            if (array_key_exists('TotalUsed', $it["OfferSummary"]))
                $infos["TotalUsed"] = $it["OfferSummary"]["TotalUsed"];
            else $infos["TotalUsed"] = null;
        }

        else {
            $infos["LowestNewPrice"] = null;
            $infos["TotalNew"] = null;
            $infos["LowestUsedPrice"] = null;
            $infos["TotalUsed"] = null;
        }

        // Product description
        if (array_key_exists('EditorialReviews', $it)) {

            // One review only
            if (array_key_exists('Content', $it["EditorialReviews"]["EditorialReview"])) {
                $infos["EditorialReview"] = $it["EditorialReviews"]["EditorialReview"]["Content"];
                $infos["EditorialReviews"] = null;
            }

            // Many reviews
            else {
                $infos["EditorialReviews"] = $it["EditorialReviews"]["EditorialReview"];
                $infos["EditorialReview"] = null;
            }
        }

        else {
            $infos["EditorialReviews"] = null;
            $infos["EditorialReview"] = null;
        }

        // Similar products
        if (array_key_exists('SimilarProducts', $it))
            $infos["SimilarProducts"] = $it["SimilarProducts"]["SimilarProduct"];
        else $infos["SimilarProducts"] = null;


            return $this->render('IUTCatalogBundle:album:details.html.twig', array(
            'album' => $album,
            'disques' => $discsWithRecords,
            'it' => $it,
            'infos' => $infos
        ));
    }


}
