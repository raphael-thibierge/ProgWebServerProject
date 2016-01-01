<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 10/12/15
 * Time: 00:57
 */
namespace IUT\CatalogBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class MusicienRepository extends EntityRepository
{
  /*  public function getMusiciens($premier, $nombre, $letter){
        $query = $this->createQueryBuilder('m')
            ->where('m.nomMusicien LIKE :letter')
            ->orderBy('m.nomMusicien')
            ->setParameter('letter', $letter.'%')
            ->getQuery();

        $query
            ->setFirstResult(($premier - 1) * $nombre)
            ->setMaxResults($nombre);

        return new Paginator($query, true);
    }*/

    public function getMusiciens($letter){
        $query = $this->createQueryBuilder('m')
            ->where('m.nomMusicien LIKE :letter')
            //->orderBy('m.nomMusicien')
            ->setParameter('letter', $letter.'%')
            ->getQuery();

        /* $query
             ->setFirstResult(($premier - 1) * $nombre)
             ->setMaxResults($nombre);*/

        return new Paginator($query, true);
    }
}