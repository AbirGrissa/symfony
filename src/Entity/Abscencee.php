<?php

namespace App\Entity;

use App\Repository\AbscenceeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AbscenceeRepository::class)]
class Abscencee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $senace = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255)]
    private ?string $module = null;

    #[ORM\Column(length: 255)]
    private ?string $excuse = null;

    #[ORM\ManyToMany(targetEntity: Etudiantt::class, mappedBy: 'abs')]
    private Collection $etudiantts;

    public function __construct()
    {
        $this->etudiantts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSenace(): ?string
    {
        return $this->senace;
    }

    public function setSenace(string $senace): self
    {
        $this->senace = $senace;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getModule(): ?string
    {
        return $this->module;
    }

    public function setModule(string $module): self
    {
        $this->module = $module;

        return $this;
    }

    public function getExcuse(): ?string
    {
        return $this->excuse;
    }

    public function setExcuse(string $excuse): self
    {
        $this->excuse = $excuse;

        return $this;
    }

    /**
     * @return Collection<int, Etudiantt>
     */
    public function getEtudiantts(): Collection
    {
        return $this->etudiantts;
    }

    public function addEtudiantt(Etudiantt $etudiantt): self
    {
        if (!$this->etudiantts->contains($etudiantt)) {
            $this->etudiantts->add($etudiantt);
            $etudiantt->addAb($this);
        }

        return $this;
    }

    public function removeEtudiantt(Etudiantt $etudiantt): self
    {
        if ($this->etudiantts->removeElement($etudiantt)) {
            $etudiantt->removeAb($this);
        }

        return $this;
    }
    public function __toString():string
    {
        return $this->senace;
    }
}
