<?php

namespace EP\TournamentBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ClubRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ClubRepository extends EntityRepository
{
    public function findParisians()
    {
        $queryBuilder = $this->createQueryBuilder('c')
                        ->where('c.zipcode <= 75999')
                        ->andWhere('c.zipcode >= 75000');
        
        $query = $queryBuilder->getQuery();
        $results = $query->getResult();

        return $results;
    }
}
