<?php

namespace App\Entity;

use App\Repository\KenisitherapeuteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KenisitherapeuteRepository::class)]
class Kenisitherapeute
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $ville = null;

    #[ORM\Column(length: 250)]
    private ?string $services = null;

    #[ORM\Column]
    private ?bool $premium = null;

    #[ORM\OneToOne(targetEntity: Personne::class)]
    #[ORM\JoinColumn(name: "personne_id", referencedColumnName: "id", onDelete: "CASCADE")]
    private $personne;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getServices(): ?string
    {
        return $this->services;
    }

    public function setServices(string $services): static
    {
        $this->services = $services;

        return $this;
    }

    public function isPremium(): ?bool
    {
        return $this->premium;
    }

    public function setPremium(bool $premium): static
    {
        $this->premium = $premium;

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
