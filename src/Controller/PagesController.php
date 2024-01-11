<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PagesController extends AbstractController
{
    #[Route('/pages/hobbies', name: 'app_pages_hobbies')]
    public function hobbies(): Response
    {
        return $this->render('pages/hobbies.html.twig', [
            'controller_name' => 'PagesController',
        ]);
    }

    #[Route('/pages/voiture', name: 'app_pages_voiture')]
    public function voiture(): Response
    {
        return $this->render('pages/voiture.html.twig', [
            'controller_name' => 'PagesController',
        ]);
    }

    #[Route('/pages/jeuxvid', name: 'app_pages_jeuxvid')]
    public function jeuxvid(): Response
    {
        return $this->render('pages/jeuxvid.html.twig', [
            'controller_name' => 'PagesController',
        ]);
    }

    #[Route('/pages/montagne', name: 'app_pages_montagne')]
    public function montagne(): Response
    {
        return $this->render('pages/montagne.html.twig', [
            'controller_name' => 'PagesController',
        ]);
    }

    #[Route('/', name: 'app_pages_index')]
    public function index(): Response
    {
        return $this->render('pages/index.html.twig', [
            'controller_name' => 'PagesController',
        ]);
    }

    #[Route('/pages/entreprise', name: 'app_pages_entreprise')]
    public function entreprise(): Response
    {
        return $this->render('pages/entreprise.html.twig', [
            'controller_name' => 'PagesController',
        ]);
    }

    #[Route('/pages/formation', name: 'app_pages_formation')]
    public function formation(): Response
    {
        return $this->render('pages/formation.html.twig', [
            'controller_name' => 'PagesController',
        ]);
    }

    #[Route('/pages/contact', name: 'app_pages_contact')]
    public function contact(): Response
    {
        return $this->render('pages/contact.html.twig', [
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

    #[Route('/pages/competences', name: 'app_pages_competences')]
    public function competences(): Response
    {
        return $this->render('pages/competences.html.twig', [
            'controller_name' => 'PagesController',
        ]);
    }

    #[Route('/pages/brep', name: 'app_pages_brep')]
    public function brep(): Response
    {
        return $this->render('pages/brep.html.twig', [
            'controller_name' => 'PagesController',
        ]);
    }

    #[Route('/pages/mrep', name: 'app_pages_mrep')]
    public function mrep(): Response
    {
        return $this->render('pages/mrep.html.twig', [
            'controller_name' => 'PagesController',
        ]);
    }
}
