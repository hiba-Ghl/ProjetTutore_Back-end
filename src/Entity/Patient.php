<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PatientRepository::class)]
class Patient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\OneToOne(targetEntity: Personne::class)]
    #[ORM\JoinColumn(name: "personne_id", referencedColumnName: "id", onDelete: "CASCADE")]
    private $personne;
    #[ORM\Column(type: "date")]
    private $date_naissance;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate_naissance(): ?int
    {
        return $this->date_naissance;
    }

    public function setDate_naissance(int $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }
    public function getPersonne(): Personne
    {
        return $this->personne;
    }

    public function setPersonne(Personne $personne): self
    {
        $this->personne = $personne;

        return $this;
    }
}
