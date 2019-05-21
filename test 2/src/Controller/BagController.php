<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BagController extends AbstractController
{
    /**
     * @Route("/bag", name="bag")
     */
    public function index()
    {
        $potions = $this->getDoctrine()->getRepository(Pokemon::class)->findAll();

        return $this->render('bag/index.html.twig', [
            'potions'=>$potions,
        ]);
    }
}
