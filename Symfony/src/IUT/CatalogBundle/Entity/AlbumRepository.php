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
}