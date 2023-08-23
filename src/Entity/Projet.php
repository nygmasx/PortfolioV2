<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjetRepository::class)]
class Projet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $period = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'projet', targetEntity: ImageProjet::class, orphanRemoval: true)]
    private Collection $imageProjets;

    #[ORM\ManyToMany(targetEntity: Techno::class, inversedBy: 'projets')]
    private Collection $technos;

    public function __construct()
    {
        $this->imageProjets = new ArrayCollection();
        $this->technos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getPeriod(): ?\DateTimeInterface
    {
        return $this->period;
    }

    public function setPeriod(\DateTimeInterface $period): static
    {
        $this->period = $period;

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

    /**
     * @return Collection<int, ImageProjet>
     */
    public function getImageProjets(): Collection
    {
        return $this->imageProjets;
    }

    public function addImageProjet(ImageProjet $imageProjet): static
    {
        if (!$this->imageProjets->contains($imageProjet)) {
            $this->imageProjets->add($imageProjet);
            $imageProjet->setProjet($this);
        }

        return $this;
    }

    public function removeImageProjet(ImageProjet $imageProjet): static
    {
        if ($this->imageProjets->removeElement($imageProjet)) {
            // set the owning side to null (unless already changed)
            if ($imageProjet->getProjet() === $this) {
                $imageProjet->setProjet(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Techno>
     */
    public function getTechnos(): Collection
    {
        return $this->technos;
    }

    public function addTechno(Techno $techno): static
    {
        if (!$this->technos->contains($techno)) {
            $this->technos->add($techno);
        }

        return $this;
    }

    public function removeTechno(Techno $techno): static
    {
        $this->technos->removeElement($techno);

        return $this;
    }
}
