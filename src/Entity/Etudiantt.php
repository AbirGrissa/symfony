<?php

namespace App\Entity;

use App\Repository\EtudianttRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtudianttRepository::class)]
class Etudiantt
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $matricule = null;

    #[ORM\Column]
    private ?int $cin = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $classse = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dn = null;

    #[ORM\ManyToMany(targetEntity: Abscencee::class, inversedBy: 'etudiantts')]
    private Collection $abs;

    public function __construct()
    {
        $this->abs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getCin(): ?int
    {
        return $this->cin;
    }

    public function setCin(int $cin): self
    {
        $this->cin = $cin;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getClassse(): ?string
    {
        return $this->classse;
    }

    public function setClassse(string $classse): self
    {
        $this->classse = $classse;

        return $this;
    }

    public function getDn(): ?\DateTimeInterface
    {
        return $this->dn;
    }

    public function setDn(\DateTimeInterface $dn): self
    {
        $this->dn = $dn;

        return $this;
    }

    /**
     * @return Collection<int, Abscencee>
     */
    public function getAbs(): Collection
    {
        return $this->abs;
    }

    public function addAb(Abscencee $ab): self
    {
        if (!$this->abs->contains($ab)) {
            $this->abs->add($ab);
        }

        return $this;
    }

    public function removeAb(Abscencee $ab): self
    {
        $this->abs->removeElement($ab);

        return $this;
    }
    public function __toString():string
    {
        return $this->matricule;
    }
}
