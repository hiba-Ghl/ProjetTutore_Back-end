<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnnonceRepository::class)]
class Annonce
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_annonce = null;

    #[ORM\Column(length: 200)]
    private ?string $labelle = null;

    #[ORM\Column(length: 500)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column]
    private ?float $solde = null;

    #[ORM\OneToOne(targetEntity: Kenisitherapeute::class)]
    #[ORM\JoinColumn(name: "Kenisitherapeute_id", referencedColumnName: "id", onDelete: "CASCADE")]
    private $Kenisitherapeute;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAnnonce(): ?int
    {
        return $this->id_annonce;
    }

    public function setIdAnnonce(int $id_annonce): static
    {
        $this->id_annonce = $id_annonce;

        return $this;
    }

    public function getLabelle(): ?string
    {
        return $this->labelle;
    }

    public function setLabelle(string $labelle): static
    {
        $this->labelle = $labelle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getSolde(): ?float
    {
        return $this->solde;
    }

    public function setSolde(float $solde): static
    {
        $this->solde = $solde;

        return $this;
    }
    public function getKenisitherapeute(): Kenisitherapeute
    {
        return $this->Kenisitherapeute;
    }

    public function setKenisitherapeute(Kenisitherapeute $Kenisitherapeute): self
    {
        $this->Kenisitherapeute = $Kenisitherapeute;

        return $this;
    }
}
