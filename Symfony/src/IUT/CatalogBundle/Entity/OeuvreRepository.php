<?php
/**
 * Created by PhpStorm.
 * User: raphael
 * Date: 01/01/15
 * Time: 21:10
 */
namespace IUT\CatalogBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\ORM\Query\ResultSetMapping;

class OeuvreRepository extends EntityRepository
{
    public function getOeuvreList($letter){
        $query = $this->createQueryBuilder('o')
            ->where('o.titreOeuvre LIKE :letter')
           // ->orderBy('o.titreOeuvre')
            ->setParameter('letter', $letter.'%')
            ->getQuery();

        /*$query
            ->setFirstResult(($premier - 1) * $nombre)
            ->setMaxResults($nombre);*/

        return new Paginator($query, true);
    }

    public function getNb(){
        return $this->createQueryBuilder('o')
            ->select('COUNT(o)')
            ->getQuery()
            ->getSingleScalarResult();
    }


    public function getOeuvresByMusician($codeMusicien){
        $rsm = new ResultSetMapping();
        $rsm->addEntityResult('IUT\CatalogBundle\Entity\Oeuvre', 'a');
        $rsm->addFieldResult('a', 'Code_Oeuvre', 'codeOeuvre');
        $rsm->addFieldResult('a', 'Titre_Oeuvre', 'titreOeuvre');
        $rsm->addFieldResult('a', 'Sous_Titre', 'sousTitre');
        $rsm->addFieldResult('a', 'Tonalité', 'tonalité');
        $rsm->addFieldResult('a', 'Année', 'année');
        $rsm->addFieldResult('a', 'Opus', 'opus');
        $rsm->addFieldResult('a', 'Numéro_Opus', 'numéroOpus');
        $rsm->addFieldResult('a', 'Code_Type', 'codeType');

        return $this->getEntityManager()
            ->createNativeQuery('SELECT DISTINCT a.* FROM Oeuvre a ' .
                'inner join Composer ON a.Code_Oeuvre = Composer.Code_Oeuvre ' .
                'inner join Musicien on Composer.Code_Musicien = Musicien.Code_Musicien ' .
                'where Musicien.Code_Musicien = ? ', $rsm)
            ->setParameter(1, $codeMusicien)
            ->getResult();

    }
}