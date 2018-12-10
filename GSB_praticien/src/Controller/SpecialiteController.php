<?php

namespace App\Controller;

use App\Repository\SpecialiteRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SpecialiteController extends AbstractController
{
    /**
     * @Route("/specialite", name="specialite")
     */
    public function FindAll(SpecialiteRepository $repo)
    {
        $specialites = $repo->FindAll();

        return $this->render('specialite/index.html.twig', [
            'controller_name' => 'SpecialiteController',
            'specialites'=> $specialites
        ]);
    }
}
