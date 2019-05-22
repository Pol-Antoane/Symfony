<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AcceuilController extends AbstractController
{
    /**
     * @Route("/acceuil", name="acceuil")
     */
    public function index()
    {
        return $this->render('acceuil/connecté.html.twig', [
            'controller_name' => 'AcceuilController',
        ]);
    }
}
