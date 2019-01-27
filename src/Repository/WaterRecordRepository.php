<?php

namespace App\Repository;

use App\Entity\WaterRecord;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method WaterRecord|null find($id, $lockMode = null, $lockVersion = null)
 * @method WaterRecord|null findOneBy(array $criteria, array $orderBy = null)
 * @method WaterRecord[]    findAll()
 * @method WaterRecord[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WaterRecordRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, WaterRecord::class);
    }

    // /**
    //  * @return WaterRecord[] Returns an array of WaterRecord objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WaterRecord
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
