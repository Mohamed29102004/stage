<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PagesController extends AbstractController
{
    #[Route('/', name: 'app_pages_index')]
    public function index(): Response
    {
        return $this->render('pages/index.html.twig', [
            'controller_name' => 'PagesController',
        ]);
    }

    #[Route('/pages/monStage', name: 'app_pages_monStage')]
    public function monStage(): Response
    {
        return $this->render('pages/monStage.html.twig', [
            'controller_name' => 'PagesController',
        ]);
    }
}
