<?php

namespace App\Entity;

use App\Repository\MatiereRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MatiereRepository::class)
 */
class Matiere
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomM;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $coef;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rea;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomM(): ?string
    {
        return $this->nomM;
    }

    public function setNomM(string $nomM): self
    {
        $this->nomM = $nomM;

        return $this;
    }

    public function getCoef(): ?int
    {
        return $this->coef;
    }

    public function setCoef(?int $coef): self
    {
        $this->coef = $coef;

        return $this;
    }

    public function getRea(): ?string
    {
        return $this->rea;
    }

    public function setRea(string $rea): self
    {
        $this->rea = $rea;

        return $this;
    }
}
