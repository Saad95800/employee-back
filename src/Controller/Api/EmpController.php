<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Emp;

#[Route('/api')]
class EmpController extends AbstractController
{
    #[Route('/employees', name: 'app_emp', methods: ['POST'])]
    public function getEmployees(Request $request, EntityManagerInterface $em): Response
    {

        $data = json_decode($request->getContent());

        $employees = $em->getRepository(Emp::Class)->findAllEmployeesByField('job', $data->job);

        return new JsonResponse([
            'employees' => $employees,
        ], 200);
    }
}
