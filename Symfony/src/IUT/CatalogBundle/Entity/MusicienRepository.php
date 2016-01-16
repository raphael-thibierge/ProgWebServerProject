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


    public function getOrchestraConductorByOrchestra($codeOrchestra){
        $rsm = new ResultSetMapping();
        $rsm->addEntityResult('IUT\CatalogBundle\Entity\Album', 'm');
        $rsm->addFieldResult('m', 'Code_Musicien', 'codeMusicien');
        $rsm->addFieldResult('m', 'Nom_Musicien', 'nomMusicien');
        $rsm->addFieldResult('m', 'Prénom_Musicien', 'prénomMusicien');
        //$rsm->addFieldResult('m', 'Code_Pays', 'codePays');
        $rsm->addFieldResult('m', 'Photo', 'Image');
// build rsm here

        return $this->getEntityManager()
            ->createNativeQuery('SELECT DISTINCT m.* FROM Musicien m ' .
                'INNER JOIN Direction ON Musicien.Code_Musicien = Direction.Code_Musicien ' .
                'INNER JOIN Orchestres ON Direction.Code_Orchestre = Orchestres.Code_Orchestre ' .
                'where Orchestres.Code_Orchestre = ? ', $rsm)
            ->setParameter(1, $codeOrchestra)
            ->getResult();

    }


    public function getNb(){
        return $this->createQueryBuilder('m')
            ->select('COUNT(m)')
            ->getQuery()
            ->getSingleScalarResult();
    }

}