<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Charts\DataTable;

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
}
