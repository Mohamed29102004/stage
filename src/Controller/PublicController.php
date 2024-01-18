<?php

namespace App\Controller;

use App\Entity\Page;
use App\Repository\PageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublicController extends AbstractController
{
    #[Route('/public', name: 'app_public')]
    public function index(): Response
    {
        return $this->render('public/index.html.twig', [
            'controller_name' => 'PublicController',
        ]);
    }

    #[Route('/menu', name: 'app_public_menu')]
    public function menu(PageRepository $pageRepository): Response 
    {
        $menus = $pageRepository->findBy(['isMenu'=>true]);

        return $this->render('public/menu.html.twig', [
            'menus' => $menus,
        ]);
    }
}
