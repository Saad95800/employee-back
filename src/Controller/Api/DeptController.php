<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Dept;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

#[Route('/api')]
class DeptController extends AbstractController
{

    #[Route('/departments', name: 'app_dept')]
    public function getDepartments(EntityManagerInterface $em): JsonResponse
    {

        $departments = $em->getRepository(Dept::Class)->findAllDepartments();

        return new JsonResponse([
            'departments' => $departments,
        ], 200);
    }
}
