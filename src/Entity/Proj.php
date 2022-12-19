<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Proj
 *
 * @ORM\Table(name="proj", indexes={@ORM\Index(name="fk_PROJ", columns={"EMPNO"})})
 * @ORM\Entity
 */
class Proj
{
    /**
     * @var int
     *
     * @ORM\Column(name="PROJID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $projid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="STARTDATE", type="date", nullable=false)
     */
    private $startdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ENDDATE", type="date", nullable=false)
     */
    private $enddate;

    /**
     * @var \Emp
     *
     * @ORM\ManyToOne(targetEntity="Emp")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="EMPNO", referencedColumnName="EMPNO")
     * })
     */
    private $empno;

    public function getProjid(): ?int
    {
        return $this->projid;
    }

    public function getStartdate(): ?\DateTimeInterface
    {
        return $this->startdate;
    }

    public function setStartdate(\DateTimeInterface $startdate): self
    {
        $this->startdate = $startdate;

        return $this;
    }

    public function getEnddate(): ?\DateTimeInterface
    {
        return $this->enddate;
    }

    public function setEnddate(\DateTimeInterface $enddate): self
    {
        $this->enddate = $enddate;

        return $this;
    }

    public function getEmpno(): ?Emp
    {
        return $this->empno;
    }

    public function setEmpno(?Emp $empno): self
    {
        $this->empno = $empno;

        return $this;
    }


}
