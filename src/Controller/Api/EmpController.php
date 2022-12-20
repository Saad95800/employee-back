<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Emp;
use App\Entity\dept;
use DateTimeImmutable;

#[Route('/api')]
class EmpController extends AbstractController
{
    #[Route('/employees', name: 'app_emp', methods: ['POST'])]
    public function getEmployees(Request $request, EntityManagerInterface $em): JsonResponse
    {

        $data = json_decode($request->getContent());

        $employees = $em->getRepository(Emp::Class)->findAllEmployeesByField('job', $data->job);

        return new JsonResponse([
            'employees' => $employees,
        ], 200);
    }

    #[Route('/employee/update/{id}', name: 'app_update_emp', methods: ['POST'])]
    public function updateEmployee($id, Request $request, EntityManagerInterface $em): JsonResponse
    {

        $data = json_decode($request->getContent());

        $employee = $em->getRepository(Emp::Class)->find($id);
        $manager = $em->getRepository(Emp::Class)->find($data->MGRNO);
        $department = $em->getRepository(dept::Class)->find($data->DEPTNO);

        $employee->setEname($data->ENAME);
        $employee->setJob($data->JOB);
        $employee->setMgr($manager);
        $employee->setDeptno($department);
        $employee->setSal($data->SAL);
        $employee->setComm($data->COMM);

        $em->flush();

        return new JsonResponse([
            'error' => false
        ], 200);
    }
    
    #[Route('/employee/add', name: 'app_add_emp', methods: ['POST'])]
    public function addEmployee(Request $request, EntityManagerInterface $em): JsonResponse
    {

        $data = json_decode($request->getContent());

        $employee = new Emp();
        $manager = $em->getRepository(Emp::Class)->find($data->MGRNO);
        $department = $em->getRepository(dept::Class)->find($data->DEPTNO);

        do{
            $fourdigitrandom = rand(1000,9999);
        }while($em->getRepository(Emp::Class)->find($fourdigitrandom));

        $employee->setEmpno($fourdigitrandom);

        $employee->setEname($data->ENAME);
        $employee->setJob($data->JOB);
        $employee->setMgr($manager);
        $employee->setDeptno($department);
        $employee->setSal($data->SAL);
        $employee->setComm($data->COMM);
        $employee->setHiredate(new DateTimeimmutable());

        $em->persist($employee);
        $em->flush();

        return new JsonResponse([
            'error' => false
        ], 200);
    }

}
