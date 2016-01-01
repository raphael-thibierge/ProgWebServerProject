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
}