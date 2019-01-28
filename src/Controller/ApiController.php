<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Charts\DataTable;
use App\Service\WaterRecordService;

/**
 *
 * Controller used to manage API calls
 *
 * API allows to create new records for example
 *
 * @Route("/api")
 */
class ApiController extends AbstractController
{
    protected $waterService;

    public function __construct(WaterRecordService $waterService)
    {
        $this->waterService = $waterService;
    }
    
    /**
     * Add a new water record to the database
     *
     * @Route("/water/add", name="api_water_add")
     */
    public function addRecord()
    {
        $table = new DataTable();
        $table->addCol('string', 'Element');
        $table->addCol('number', 'Percentage');

        $table->addRow(['Nitrogen', 0.7]);
        $table->addRow(['Oxygen', 0.21]);
        $table->addRow(['Other', 0.01]);

        return new JsonResponse($table);
    }

    /**
     * Returns the water records for the last 7 days
     *
     * @Route("/water/usage/weekly", name="api_water_weekly_usage")
     */
    public function getWeeklyRecords()
    {
        $from = new \DateTime('now -7 days');
        $to = new \DateTime('now');

        $records = $this->waterService->getRecords($from, $to, WaterRecordService::PERIOD_DAY);
        
        $table = new DataTable();
        $table->addCol('string', 'Jour');
        $table->addCol('number', 'Volume');

        foreach ($records as $record) {
            $table->addRow([$record['day'], $record['volume']]);
        }
        return new JsonResponse($table);
    }
}
