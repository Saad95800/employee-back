<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dept
 *
 * @ORM\Table(name="dept")
 * @ORM\Entity(repositoryClass="App\Repository\DeptRepository")
 */
class Dept
{
    
    /**
     * @var int
     *
     * @ORM\Column(name="DEPTNO", type="integer", nullable=false, options={"comment"="Department's identification number"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $deptno;

    /**
     * @var string
     *
     * @ORM\Column(name="DNAME", type="string", length=20, nullable=false, options={"comment"="Name of the current department"})
     */
    private $dname;

    /**
     * @var string
     *
     * @ORM\Column(name="LOC", type="string", length=20, nullable=false, options={"comment"="Location of the current department"})
     */
    private $loc;


}
