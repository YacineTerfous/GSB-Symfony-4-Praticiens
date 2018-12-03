<?php

namespace App\Controller;

use App\Repository\PraticienRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PraticienController extends AbstractController
{
    /**
     * @Route("/praticien", name="praticien")
     */
    public function index(PraticienRepository $repo)
    {
        //recherche de toute les praticiens
        $praticiens=$repo->findAll();

        return $this->render('praticien/praticien.html.twig', [
            'controller_name' => 'PraticienController',
        ]);
    }
}
