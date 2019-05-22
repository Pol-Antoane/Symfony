<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class StarterController extends AbstractController
{
    /**
     * @Route("/starter", name="starter")
     */
    public function index()
    {
        return $this->render('starter/index.html.twig', [
            'controller_name' => 'StarterController',
        ]);
    }
}
