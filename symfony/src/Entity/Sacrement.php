<?php

namespace App\Entity;

use App\Repository\SacrementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SacrementRepository::class)]
class Sacrement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $type = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $datePrevue = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    private ?array $lieuReservation = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    private ?array $entiteLiee = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    private ?array $dossierBeneficiaires = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    private ?array $dossier = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    private ?array $celebrant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getDatePrevue(): ?\DateTime
    {
        return $this->datePrevue;
    }

    public function setDatePrevue(?\DateTime $datePrevue): static
    {
        $this->datePrevue = $datePrevue;

        return $this;
    }

    public function getLieuReservation(): ?array
    {
        return $this->lieuReservation;
    }

    public function setLieuReservation(?array $lieuReservation): static
    {
        $this->lieuReservation = $lieuReservation;

        return $this;
    }

    public function getEntiteLiee(): ?array
    {
        return $this->entiteLiee;
    }

    public function setEntiteLiee(?array $entiteLiee): static
    {
        $this->entiteLiee = $entiteLiee;

        return $this;
    }

    public function getDossierBeneficiaires(): ?array
    {
        return $this->dossierBeneficiaires;
    }

    public function setDossierBeneficiaires(?array $dossierBeneficiaires): static
    {
        $this->dossierBeneficiaires = $dossierBeneficiaires;

        return $this;
    }

    public function getDossier(): ?array
    {
        return $this->dossier;
    }

    public function setDossier(?array $dossier): static
    {
        $this->dossier = $dossier;

        return $this;
    }

    public function getCelebrant(): ?array
    {
        return $this->celebrant;
    }

    public function setCelebrant(?array $celebrant): static
    {
        $this->celebrant = $celebrant;

        return $this;
    }
}
