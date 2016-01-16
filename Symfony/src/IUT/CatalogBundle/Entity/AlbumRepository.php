<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 01/01/15
 * Time: 17:40
 */
namespace IUT\CatalogBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\Tools\Pagination\Paginator;

class AlbumRepository extends EntityRepository
{
    public function getAlbumList($letter){
        $query = $this->createQueryBuilder('a')
            ->where('a.titreAlbum LIKE :letter')
           // ->orderBy('a.titreAlbum')
            ->setParameter('letter', $letter.'%')
            ->getQuery();

        /*$query
            ->setFirstResult(($premier - 1) * $nombre)
            ->setMaxResults($nombre);*/

        return new Paginator($query, true);
    }

    public function getAlbumsConducted($codeMusicien){
        $rsm = new ResultSetMapping();
        $rsm->addEntityResult('IUT\CatalogBundle\Entity\Album', 'a');
        $rsm->addFieldResult('a', 'Code_Album', 'codeAlbum');
        $rsm->addFieldResult('a', 'Titre_Album', 'titreAlbum');
        $rsm->addFieldResult('a', 'Année_Album', 'anneeAlbum');
        //$rsm->addFieldResult('a', 'Code_Genre', 'codeGenre');
       // $rsm->addFieldResult('a', 'Code_Editeur', 'codeEditeur');
        $rsm->addFieldResult('a', 'Pochette', 'pochette');
        $rsm->addFieldResult('a', 'ASIN', 'ASIN');
// build rsm here

        return $this->getEntityManager()
            ->createNativeQuery('SELECT DISTINCT a.* FROM Album a ' .
                                'inner join Disque ON a.Code_Album = Disque.Code_Album ' .
                                'inner join Composition_Disque on Disque.Code_Disque = Composition_Disque.Code_Disque ' .
                                'inner join Enregistrement on Composition_Disque.Code_Morceau = Enregistrement.Code_Morceau ' .
                                'inner join Direction on Enregistrement.Code_Morceau = Direction.Code_Morceau ' .
                                'inner join Musicien on Direction.Code_Musicien = Musicien.Code_Musicien where Musicien.Code_Musicien = ? ', $rsm)
            ->setParameter(1, $codeMusicien)
            ->getResult();

    }


    public function getAlbumsComposed($codeMusicien){
        $rsm = new ResultSetMapping();
        $rsm->addEntityResult('IUT\CatalogBundle\Entity\Album', 'a');
        $rsm->addFieldResult('a', 'Code_Album', 'codeAlbum');
        $rsm->addFieldResult('a', 'Titre_Album', 'titreAlbum');
        $rsm->addFieldResult('a', 'Année_Album', 'anneeAlbum');
        //$rsm->addFieldResult('a', 'Code_Genre', 'codeGenre');
        // $rsm->addFieldResult('a', 'Code_Editeur', 'codeEditeur');
        $rsm->addFieldResult('a', 'Pochette', 'pochette');
        $rsm->addFieldResult('a', 'ASIN', 'ASIN');
// build rsm here

        return $this->getEntityManager()
            ->createNativeQuery('SELECT DISTINCT a.* FROM Album a ' .
                'inner join Disque ON a.Code_Album = Disque.Code_Album ' .
                'inner join Composition_Disque on Disque.Code_Disque = Composition_Disque.Code_Disque ' .
                'inner join Enregistrement on Composition_Disque.Code_Morceau = Enregistrement.Code_Morceau ' .
                'inner join Composition_Oeuvre on Enregistrement.Code_Composition = Composition_Oeuvre.Code_Composition ' .
                'inner join Composer on Composition_Oeuvre.Code_Oeuvre = Composer.Code_Oeuvre ' .
                'inner join Musicien on Composer.Code_Musicien = Musicien.Code_Musicien ' .
                'where Musicien.Code_Musicien = ? ', $rsm)
            ->setParameter(1, $codeMusicien)
            ->getResult();

    }

    public function getAlbumsByInstrument($codeInstrument){
        $rsm = new ResultSetMapping();
        $rsm->addEntityResult('IUT\CatalogBundle\Entity\Album', 'a');
        $rsm->addFieldResult('a', 'Code_Album', 'codeAlbum');
        $rsm->addFieldResult('a', 'Titre_Album', 'titreAlbum');
        $rsm->addFieldResult('a', 'Année_Album', 'anneeAlbum');
        //$rsm->addFieldResult('a', 'Code_Genre', 'codeGenre');
        // $rsm->addFieldResult('a', 'Code_Editeur', 'codeEditeur');
        $rsm->addFieldResult('a', 'Pochette', 'pochette');
        $rsm->addFieldResult('a', 'ASIN', 'ASIN');

        return $this->getEntityManager()
            ->createNativeQuery('SELECT DISTINCT a.* FROM Album a ' .
                'inner join Disque ON a.Code_Album = Disque.Code_Album ' .
                'inner join Composition_Disque on Disque.Code_Disque = Composition_Disque.Code_Disque ' .
                'inner join Enregistrement on Composition_Disque.Code_Morceau = Enregistrement.Code_Morceau ' .
                'inner join Interpréter on Enregistrement.Code_Morceau = Interpréter.Code_Morceau ' .
                'inner join Instrument on Interpréter.Code_Instrument = Instrument.Code_Instrument '.
                'where Instrument.Code_Instrument = ? ', $rsm)
            ->setParameter(1, $codeInstrument)
            ->getResult();

    }

    public function getAlbumsByOrchestra($codeOrchestra){
        $rsm = new ResultSetMapping();
        $rsm->addEntityResult('IUT\CatalogBundle\Entity\Album', 'a');
        $rsm->addFieldResult('a', 'Code_Album', 'codeAlbum');
        $rsm->addFieldResult('a', 'Titre_Album', 'titreAlbum');
        $rsm->addFieldResult('a', 'Année_Album', 'anneeAlbum');
        //$rsm->addFieldResult('a', 'Code_Genre', 'codeGenre');
        // $rsm->addFieldResult('a', 'Code_Editeur', 'codeEditeur');
        $rsm->addFieldResult('a', 'Pochette', 'pochette');
        $rsm->addFieldResult('a', 'ASIN', 'ASIN');
// build rsm here

        return $this->getEntityManager()
            ->createNativeQuery('SELECT DISTINCT a.* FROM Album a ' .
                'inner join Disque ON a.Code_Album = Disque.Code_Album ' .
                'inner join Composition_Disque on Disque.Code_Disque = Composition_Disque.Code_Disque ' .
                'inner join Enregistrement on Composition_Disque.Code_Morceau = Enregistrement.Code_Morceau ' .
                'inner join Direction on Enregistrement.Code_Morceau = Direction.Code_Morceau ' .
                'inner join Orchestres on Direction.Code_Orchestre = Orchestres.Code_Orchestre ' .
                'where Orchestres.Code_Orchestre = ? ', $rsm)
            ->setParameter(1, $codeOrchestra)
            ->getResult();

    }

    public function getNb(){
        return $this->createQueryBuilder('a')
            ->select('COUNT(a)')
            ->getQuery()
            ->getSingleScalarResult();
    }


}