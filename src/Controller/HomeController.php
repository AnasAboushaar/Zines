<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MagazineRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(MagazineRepository $magazineRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'magazines' => $magazineRepository->findAll(),
        ]);
    }

    #[Route('/magazine/{id}', name: 'details_magazine', requirements:['id' => '\d+'])]
    public function details(int $id): Response
    {
        return $this->render('home/details.html.twig');
    }
}
