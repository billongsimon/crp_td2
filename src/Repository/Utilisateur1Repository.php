<?php

namespace App\Repository;

use App\Entity\Utilisateur1;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Utilisateur1|null find($id, $lockMode = null, $lockVersion = null)
 * @method Utilisateur1|null findOneBy(array $criteria, array $orderBy = null)
 * @method Utilisateur1[]    findAll()
 * @method Utilisateur1[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Utilisateur1Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Utilisateur1::class);
    }

    // /**
    //  * @return Utilisateur1[] Returns an array of Utilisateur1 objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Utilisateur1
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
