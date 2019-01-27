<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
        dump("new record...");die();
    }
}
