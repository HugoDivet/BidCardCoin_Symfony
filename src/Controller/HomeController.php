<?php

namespace App\Controller;

use App\Repository\VenteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(VenteRepository $venteRepository): Response
    {
        $ventes = $venteRepository->VenteActuelle();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'ventes' => $ventes,
        ]);
    }

}
