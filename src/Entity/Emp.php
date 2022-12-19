<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Emp
 *
 * @ORM\Table(name="emp", indexes={@ORM\Index(name="fk_MGR", columns={"MGR"}), @ORM\Index(name="fk_DEPTNO", columns={"DEPTNO"})})
 * @ORM\Entity(repositoryClass="App\Repository\EmpRepository")
 */
class Emp
{

    /**
     * @var int
     *
     * @ORM\Column(name="EMPNO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $empno;

    /**
     * @var string
     *
     * @ORM\Column(name="ENAME", type="string", length=20, nullable=false)
     */
    private $ename;

    /**
     * @var string
     *
     * @ORM\Column(name="JOB", type="string", length=20, nullable=false)
     */
    private $job;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="HIREDATE", type="date", nullable=false)
     */
    private $hiredate;

    /**
     * @var int
     *
     * @ORM\Column(name="SAL", type="integer", nullable=false)
     */
    private $sal;

    /**
     * @var int|null
     *
     * @ORM\Column(name="COMM", type="integer", nullable=true)
     */
    private $comm;

    /**
     * @var \Dept
     *
     * @ORM\ManyToOne(targetEntity="Dept")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="DEPTNO", referencedColumnName="DEPTNO")
     * })
     */
    private $deptno;

    /**
     * @var \Emp
     *
     * @ORM\ManyToOne(targetEntity="Emp")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="MGR", referencedColumnName="EMPNO")
     * })
     */
    private $mgr;

    public function getEmpno(): ?int
    {
        return $this->empno;
    }

    public function getEname(): ?string
    {
        return $this->ename;
    }

    public function setEname(string $ename): self
    {
        $this->ename = $ename;

        return $this;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(string $job): self
    {
        $this->job = $job;

        return $this;
    }

    public function getHiredate(): ?\DateTimeInterface
    {
        return $this->hiredate;
    }

    public function setHiredate(\DateTimeInterface $hiredate): self
    {
        $this->hiredate = $hiredate;

        return $this;
    }

    public function getSal(): ?int
    {
        return $this->sal;
    }

    public function setSal(int $sal): self
    {
        $this->sal = $sal;

        return $this;
    }

    public function getComm(): ?int
    {
        return $this->comm;
    }

    public function setComm(?int $comm): self
    {
        $this->comm = $comm;

        return $this;
    }

    public function getDeptno(): ?Dept
    {
        return $this->deptno;
    }

    public function setDeptno(?Dept $deptno): self
    {
        $this->deptno = $deptno;

        return $this;
    }

    public function getMgr(): ?self
    {
        return $this->mgr;
    }

    public function setMgr(?self $mgr): self
    {
        $this->mgr = $mgr;

        return $this;
    }

}
