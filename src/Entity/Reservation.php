<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_res = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_reservation = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $statut = null;

    #[ORM\Column]
    private ?float $comission = null;

    #[ORM\OneToOne(targetEntity: Patient::class)]
    #[ORM\JoinColumn(name: "patient_id", referencedColumnName: "id", onDelete: "CASCADE")]
    private $patient;

    #[ORM\OneToOne(targetEntity: Kenisitherapeute::class)]
    #[ORM\JoinColumn(name: "Kenisitherapeute_id", referencedColumnName: "id", onDelete: "CASCADE")]
    private $Kenisitherapeute;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdRes(): ?int
    {
        return $this->id_res;
    }

    public function setIdRes(int $id_res): static
    {
        $this->id_res = $id_res;

        return $this;
    }

    public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->date_reservation;
    }

    public function setDateReservation(\DateTimeInterface $date_reservation): static
    {
        $this->date_reservation = $date_reservation;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getComission(): ?float
    {
        return $this->comission;
    }

    public function setComission(float $comission): static
    {
        $this->comission = $comission;

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


    public function getPatient(): patient
    {
        return $this->patient;
    }

    public function setPatient(patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }
    
}
