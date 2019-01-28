<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\WaterRecord;
use App\Repository\WaterRecordRepository;

class WaterRecordService
{
    // Periods used to group results
    // Must be the MySQL function used for the group by
    const PERIOD_DAY = 'day';
    const PERIOD_HOUR = 'hour';

    private $em;
    private $waterRepo;

    public function __construct(EntityManagerInterface $em, WaterRecordRepository $waterRepo)
    {
        $this->em = $em;
        $this->waterRepo = $waterRepo;
    }

    public function addRecord($volume)
    {
        $record = new WaterRecord();
        $record->volume = $volume;

        // Save to db
        // ...
    }

    /**
     * Returns the total volume of water used
     */
    public function getTotalVolume()
    {
        return $this->waterRepo->findTotalVolume();
    }

    /**
     * Fetches the water records in the given date range and
     * group them by the given time period (hour, day, etc.)
     */
    public function getRecords(\DateTime $from, \DateTime $to, $period): array
    {
        return $this->waterRepo->findAllByPeriod(
            $from->setTime(0, 0), 
            $to->setTime(23, 59), 
            $period
        );
    }
}
