<?php

namespace App\Repository;

use App\Entity\PelletRecord;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PelletRecord|null find($id, $lockMode = null, $lockVersion = null)
 * @method PelletRecord|null findOneBy(array $criteria, array $orderBy = null)
 * @method PelletRecord[]    findAll()
 * @method PelletRecord[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PelletRecordRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PelletRecord::class);
    }

    // /**
    //  * @return PelletRecord[] Returns an array of PelletRecord objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PelletRecord
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
