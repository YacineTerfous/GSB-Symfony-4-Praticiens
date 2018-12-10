<?php

namespace App\Controller;

use App\Entity\Praticien;
use App\Repository\PraticienRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PraticienController extends AbstractController
{
    /**
     * @Route("/praticien", name="praticien")
     */
    public function index(PraticienRepository $repo)
    {
        //recherche de toute les praticiens
        $praticiens=$repo->findAll();

        return $this->render('praticien/index.html.twig', [
            'praticiens'=>$praticiens
        ]);
    }

    /**
     * @Route("/praticien/new", name="praticien_create")
     */
    public function form_pra(Praticien $praticien = null, Request $request,
    ObjectManager $manager)
    {
        if(!$praticien)
        {
            $praticien = new Praticien();
        }
        $form = $this->createFormBuilder($praticien)
                     ->add('pra_nom')
                     ->add('pra_adr')
                     ->add('pra_CP')
                     ->add('pra_ville')
                     ->add('pra_coefnotoriete')
                     ->getForm();
        
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $manager->persist($praticien);
            $manager->flush();
            
            return $this->redirectToRoute('praticien');
        }
        
    }
}