<?php

namespace App\Controller;

use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    #[ROUTE('/logout', name: 'app_logout')]
    public function logout(Security $security): Response
    {
        // logout the user in on the current firewall
        $response = $security->logout();
        return $this->redirectToRoute('app_pages_index');
    }
}
