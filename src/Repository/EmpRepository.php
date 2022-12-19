<?php

namespace App\Repository;

use App\Entity\Emp;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @extends ServiceEntityRepository<Emp>
 *
 * @method Emp|null find($id, $lockMode = null, $lockVersion = null)
 * @method Emp|null findOneBy(array $criteria, array $orderBy = null)
 * @method Emp[]    findAll()
 * @method Emp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmpRepository extends ServiceEntityRepository
{

    private $subordinates = [];

    public function __construct(ManagerRegistry $registry, private EntityManagerInterface $em)
    {
        parent::__construct($registry, Emp::class);
    }

   public function findAllEmployeesByField($field, $value): array
   {


    $conn = $this->getEntityManager()->getConnection();

    $sql = 'SELECT a.EMPNO, a.ENAME, a.JOB, c.ENAME as MGR, a.HIREDATE, a.SAL, a.COMM, b.DNAME 
            FROM emp as a
            LEFT JOIN dept as b
            ON b.DEPTNO = a.DEPTNO
            LEFT JOIN emp as c
            ON c.EMPNO = a.MGR
            WHERE 1';

    $sql2 = $sql;
    if($value){
        $sql2 = $sql . " AND a.$field = '$value'";
    }
        $stmt = $conn->prepare($sql2);
        $resultSet = $stmt->executeQuery();

        $employees = $resultSet->fetchAll();

        foreach($employees as $key => &$employee){
            $this->subordinates = [];
            $employee['subordinates'] = $this->getSubordinates($employee, $sql);
            if(!empty($employee['subordinates'])){
                $this->getDirectAndIndirectSubordinates($employee, $sql);
                $employee['directAndIndirectSubordinates'] = array_merge(...$this->subordinates);                
            }else{
                $employee['directAndIndirectSubordinates'] = [];
            }

        }
        return $employees;

    //    if($value){
    //     return $this->createQueryBuilder('e')
    //         ->innerJOIN('e.deptno','d')
    //         ->andWhere("e.$field = :field")
    //         ->setParameter(':field', $value)
    //         ->getQuery()
    //         ->getArrayResult();        
    //    }
    //    return $this->createQueryBuilder('e')
    //         ->getQuery()
    //         ->getArrayResult();
   }

   public function getSubordinates($employee, $sql){
        $conn = $this->getEntityManager()->getConnection();
        $subordinates = [];
        $sql2 = $sql . ' AND a.MGR = '.$employee['EMPNO'];
        $stmt = $conn->prepare($sql2);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAll();
   }

   public function getDirectAndIndirectSubordinates($employee, string $sql)
   {

        $subordinates = $this->getSubordinates($employee, $sql);

        if(!empty($subordinates)){
            $this->subordinates[] = $subordinates;
            foreach($subordinates as $subordinate){
                $this->getDirectAndIndirectSubordinates($subordinate, $sql);
            }
        }

    }

}
