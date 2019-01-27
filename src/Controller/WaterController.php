<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 *
 * Controller used to manage water records in back office
 *
 * @Route("/admin")
 */
class WaterController extends AbstractController
{
    /**
     * Display water record related statistics in the back office
     *
     * @Route("/water/stats", name="water_stats")
     */
    public function waterStats()
    {
        return $this->render('water/stats.html.twig');
    }
}
