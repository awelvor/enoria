<?php

namespace App\Controller;


use App\Repository\PersonneRepository;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;



final class PersonneController extends AbstractController
{
    #[Route('/personne', name: 'app_personne')]
    public function index(PersonneRepository $personneRepository): Response
    {
        return $this->render('personne/index.html.twig', [
            'controller_name' => 'PersonneController',
            'personnes'=> $personneRepository->findAll(),
        ]);
    }
}
