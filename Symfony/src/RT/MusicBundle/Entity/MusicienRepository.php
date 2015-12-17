<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 10/12/15
 * Time: 00:57
 */
namespace RT\MusicBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class MusicienRepository extends EntityRepository
{
    public function getMusiciens($premier, $nombre){
        $query = $this->createQueryBuilder('m')
            ->orderBy('m.nomMusicien')
            ->getQuery();

        $query
            ->setFirstResult(($premier - 1) * $nombre)
            ->setMaxResults($nombre);

        return new Paginator($query, true);
    }

    public function getCompositionAlbum($id){

    }

}