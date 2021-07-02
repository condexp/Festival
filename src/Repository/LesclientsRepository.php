<?php

namespace App\Repository;

use App\Entity\Lesclients;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Lesclients|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lesclients|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lesclients[]    findAll()
 * @method Lesclients[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LesclientsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lesclients::class);
    }

    // /**
    //  * @return Lesclients[] Returns an array of Lesclients objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Lesclients
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
