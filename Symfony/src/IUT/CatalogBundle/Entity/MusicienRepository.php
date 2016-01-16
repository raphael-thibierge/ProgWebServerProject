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
use Doctrine\ORM\Query\ResultSetMapping;

class MusicienRepository extends EntityRepository
{

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

    public function getNb(){
        return $this->createQueryBuilder('m')
            ->select('COUNT(m)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function getChiefsByOrchestra($codeOrchestra){
        $rsm = new ResultSetMapping();
        $rsm->addEntityResult('IUT\CatalogBundle\Entity\Musicien', 'c');
        $rsm->addFieldResult('c', 'Code_Musicien', 'codeMusicien');
        $rsm->addFieldResult('c', 'Nom_Musicien', 'nomMusicien');
        $rsm->addFieldResult('c', 'Prénom_Musicien', 'prénomMusicien');
        $rsm->addFieldResult('c', 'Année_Naissance', 'annéeNaissance');
        $rsm->addFieldResult('c', 'Photo', 'Image');

        return $this->getEntityManager()
            ->createNativeQuery('SELECT DISTINCT c.* FROM Musicien c ' .
                'inner join Direction ON c.Code_Musicien = Direction.Code_Musicien ' .
                'inner join Orchestres on Direction.Code_Orchestre = Orchestres.Code_Orchestre ' .
                'where Orchestres.Code_Orchestre = ? ', $rsm)
            ->setParameter(1, $codeOrchestra)
            ->getResult();
    }

}