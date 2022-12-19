<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api')]
class ProjController extends AbstractController
{
    #[Route('/proj', name: 'app_proj')]
    public function index(): Response
    {
        return $this->render('proj/index.html.twig', [
            'controller_name' => 'ProjController',
        ]);
    }
}
