<?php

namespace App\Repository;

use App\Entity\WaterRecord;
use App\Service\WaterRecordService;
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

    /**
     * Finds the sum of all volumes in the database
     */
    public function findTotalVolume(): int
    {
        return $this->createQueryBuilder('w')
            ->select('SUM(w.volume) as volume')
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * Finds all records for the given dates
     * grouped by the given period
     *
     * This is used to build charts
     */
    public function findAllByPeriod($from, $to, $period)
    {
        return $this->createQueryBuilder('w')
            ->select('SUM(w.volume) as volume, ' . $period . '(w.date) as ' . $period . ', w.date')
            ->andWhere('w.date BETWEEN :start AND :end')
            ->setParameter('start', $from)
            ->setParameter('end', $to)
            ->groupBy($period)
            ->getQuery()
            ->getResult();
    }
}
