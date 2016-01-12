<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 01/01/15
 * Time: 17:40
 */
namespace IUT\CatalogBundle\Entity;

use Doctrine\ORM\EntityRepository;
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

    public function getAlbumInterpreted(){
        $query = $this->createQueryBuilder('a')
            ->select('a')
            ->innerJoin('a.CompositionDisque', 'cp')
            ->innerJoin('cp.Enregistrement', 'e')
            ->innerJoin('e.CompositionOeuvre', 'co')
            ->innerJoin('co.Oeuvre', 'o')
            ->where('co.CodeOeuvre = :code')
            ->setParameter('code', 48)
            ->getQuery();
        return $query;
    }


}