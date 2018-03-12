<?php

namespace MotogpBundle\Repository;

/**
 * TeamCategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TeamCategoryRepository extends \Doctrine\ORM\EntityRepository
{
    public function getAll()
    {
        return $this->createQueryBuilder('g')
            ->orderBy('g.order', 'DESC')
            ->getQuery()
            ->getResult()
            ;
    }
}
