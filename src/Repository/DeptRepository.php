<?php

namespace App\Repository;

use App\Entity\Dept;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @extends ServiceEntityRepository<Dept>
 *
 * @method Dept|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dept|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dept[]    findAll()
 * @method Dept[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeptRepository extends ServiceEntityRepository
{

    private $subordinates = [];

    public function __construct(ManagerRegistry $registry, private EntityManagerInterface $em)
    {
        parent::__construct($registry, Dept::class);
    }

   public function findAllDepartments(): array
   {
       return $this->createQueryBuilder('d')
            ->getQuery()
            ->getArrayResult();
   }

}
