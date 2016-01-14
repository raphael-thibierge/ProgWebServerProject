<?php
namespace IUT\CatalogBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class MusicienController extends Controller
{
    public function indexAction()
    {
        return $this->listAction('A');
    }

    public function showAction($id){
        if($id < 1){
            throw $this->createNotFoundException("Le code musicien doit être positif");
        }
        $musicien = $this->getDoctrine()->getRepository('IUTCatalogBundle:Musicien')->find($id);
        if ($musicien == null){
            throw $this->createNotFoundException("Le musicien n'existe pas.");
        }
        // composed
        $composers = $this->getDoctrine()->getRepository('IUTCatalogBundle:Composer')
            ->findBy(array('codeMusicien' => $musicien));
        $oeuvres = $this->getDoctrine()->getRepository('IUTCatalogBundle:Oeuvre')
            ->findBy(array('codeOeuvre' => $composers), array('titreOeuvre' => 'ASC'));
        // albums containing records composed by this musician
        $compositionOeuvre = $this->getDoctrine()->getRepository('IUTCatalogBundle:CompositionOeuvre')
            ->findBy(array('codeOeuvre' => $oeuvres));






        $albumsConducted = $this->getDoctrine()->getRepository('IUTCatalogBundle:Album')->getAlbumsConducted($musicien);
        $albumsInterpreted = $this->getDoctrine()->getRepository('IUTCatalogBundle:Album')->getAlbumsInterpreted($musicien);
        $albumsComposed = $this->getDoctrine()->getRepository('IUTCatalogBundle:Album')->getAlbumsComposed($musicien);

        // Orchestres
        $directions = $this->getDoctrine()->getRepository('IUTCatalogBundle:Direction')
            ->findBy(array('codeMusicien' => $musicien));
        $orchestres = array();
        foreach ($directions as $direction) {
            $orchestre = $this->getDoctrine()->getRepository('IUTCatalogBundle:Orchestres')
                ->findOneBy(array('codeOrchestre' => $direction->getCodeOrchestre()));
            $orchestres[] = $orchestre->getNomOrchestre();
        }
        $orchestres = array_unique($orchestres);
        $orchestras = $this->getDoctrine()->getRepository('IUTCatalogBundle:Orchestres')
            ->findBy(array('nomOrchestre' => $orchestres));
        return $this->render('IUTCatalogBundle:musicien:details.html.twig', array(
            'musicien' => $musicien,
            'oeuvres' => $oeuvres,
            'compositions' => $compositionOeuvre,

            'albumsConducted' => $albumsConducted,
            // 'enregistrements' => $enregistrements, // est-ce pertinant d'afficher chaques enregistrement, ( liste trop longue )

            'albumsInterpreted' => $albumsInterpreted,
            'albumsComposed' => $albumsComposed,
            'orchestras' => $orchestras
        ));
    }

    public function listAction($letter){
        $musiciens = $this->getDoctrine()->getRepository('IUTCatalogBundle:Musicien')->getMusiciens($letter);
        return $this->render('IUTCatalogBundle:musicien:index.html.twig', array(
            'listTitle' => 'Liste des musiciens',
            'musiciens' => $musiciens->getQuery()->getResult(),
            'letter' => $letter,
            'route' => 'catalog_music_all_musiciens_byLetter',
        ));
    }
    public function composersAction() {
        return $this->composersListAction('A');
    }
    public function composersListAction($letter){
        $musiciens = $this->getDoctrine()->getRepository('IUTCatalogBundle:Musicien')->getMusiciens($letter);
        $composers = array();
        foreach ($musiciens as $musicien) {
            $composer = null;
            $composer = $this->getDoctrine()->getRepository('IUTCatalogBundle:Composer')->findOneBy(array('codeMusicien' => $musicien));
            // Checking if the musician is a composer. If so, we add him to the list.
            if ($composer != null)
                $composers[] = $musicien;
        }
        return $this->render('IUTCatalogBundle:musicien:index.html.twig', array(
            'listTitle' => 'Liste des compositeurs',
            'musiciens' => $composers,
            'letter' => $letter,
            'route' => 'catalog_musicien_composers_byLetter',
        ));
    }
    public function interpretesAction() {
        return $this->interpretesListAction('A');
    }
    public function interpretesListAction($letter) {
        $musiciens = $this->getDoctrine()->getRepository('IUTCatalogBundle:Musicien')->getMusiciens($letter);
        $interpretes = array();
        foreach ($musiciens as $musicien) {
            $interprete = null;
            $interprete = $this->getDoctrine()->getRepository('IUTCatalogBundle:Interpreter')->findBy(array('codeMusicien' => $musicien));
            if ($interprete != null) {
                $interpretes[] = $musicien;
            }
        }
        return $this->render('IUTCatalogBundle:musicien:index.html.twig', array(
            'listTitle' => 'Liste des interprètes',
            'musiciens' => $interpretes,
            'letter' => $letter,
            'route' => 'catalog_musicien_interpretes_byLetter',
        ));
    }
    public function chefsOrchestreAction() {
        return $this->chefsOrchestreListAction('A');
    }
    public function chefsOrchestreListAction($letter) {
        $musiciens = $this->getDoctrine()->getRepository('IUTCatalogBundle:Musicien')->getMusiciens($letter);
        $chefsOrchestre = array();
        foreach ($musiciens as $musicien) {
            $chefOrchestre = null;
            $chefOrchestre = $this->getDoctrine()->getRepository('IUTCatalogBundle:Direction')->findBy(array('codeMusicien' => $musicien));
            if ($chefOrchestre != null)
                $chefsOrchestre[] = $musicien;
        }
        return $this->render('IUTCatalogBundle:musicien:index.html.twig', array(
            'listTitle' => 'Liste des chefs d\'orchestres',
            'musiciens' => $chefsOrchestre,
            'letter' => $letter,
            'route' => 'catalog_musicien_chefsOrchestre_byLetter',
        ));
    }
}

