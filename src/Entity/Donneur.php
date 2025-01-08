<?php

namespace App\Entity;

use App\Repository\DonneurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DonneurRepository::class)]
class Donneur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $nom_materiel = null;

    #[ORM\Column(length: 100)]
    private ?string $categorie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $etat_materiel = null;

    #[ORM\OneToOne(targetEntity: Personne::class)]
    #[ORM\JoinColumn(name: "personne_id", referencedColumnName: "id", onDelete: "CASCADE")]
    private $personne;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMateriel(): ?string
    {
        return $this->nom_materiel;
    }

    public function setNomMateriel(string $nom_materiel): static
    {
        $this->nom_materiel = $nom_materiel;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getEtatMateriel(): ?string
    {
        return $this->etat_materiel;
    }

    public function setEtatMateriel(?string $etat_materiel): static
    {
        $this->etat_materiel = $etat_materiel;

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
