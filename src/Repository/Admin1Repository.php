<?php

namespace App\Repository;

use App\Entity\Admin1;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Admin1|null find($id, $lockMode = null, $lockVersion = null)
 * @method Admin1|null findOneBy(array $criteria, array $orderBy = null)
 * @method Admin1[]    findAll()
 * @method Admin1[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Admin1Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Admin1::class);
    }

    // /**
    //  * @return Admin1[] Returns an array of Admin1 objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Admin1
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
