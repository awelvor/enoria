<?php

namespace App\Entity;

use App\Repository\FoyerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FoyerRepository::class)]
class Foyer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $responsable = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    private ?array $membres = null;

    /**
     * @var Collection<int, Personne>
     */
    #[ORM\OneToMany(targetEntity: Personne::class, mappedBy: 'foyer')]
    private Collection $personnes;

    public function __construct()
    {
        $this->personnes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(?string $responsable): static
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getMembres(): ?array
    {
        return $this->membres;
    }

    public function setMembres(?array $membres): static
    {
        $this->membres = $membres;

        return $this;
    }

    /**
     * @return Collection<int, Personne>
     */
    public function getPersonnes(): Collection
    {
        return $this->personnes;
    }

    public function addPersonne(Personne $personne): static
    {
        if (!$this->personnes->contains($personne)) {
            $this->personnes->add($personne);
            $personne->setFoyer($this);
        }

        return $this;
    }

    public function removePersonne(Personne $personne): static
    {
        if ($this->personnes->removeElement($personne)) {
            // set the owning side to null (unless already changed)
            if ($personne->getFoyer() === $this) {
                $personne->setFoyer(null);
            }
        }

        return $this;
    }
}
