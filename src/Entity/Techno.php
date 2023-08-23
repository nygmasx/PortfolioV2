<?php

namespace App\Entity;

use App\Repository\TechnoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TechnoRepository::class)]
class Techno
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToOne(mappedBy: 'technos', cascade: ['persist', 'remove'])]
    private ?Catégorie $catégorie = null;

    #[ORM\ManyToMany(targetEntity: Projet::class, mappedBy: 'technos')]
    private Collection $projets;

    #[ORM\OneToOne(mappedBy: 'techno', cascade: ['persist', 'remove'])]
    private ?ImageTechno $imageTechno = null;

    public function __construct()
    {
        $this->projets = new ArrayCollection();
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

    public function getCatégorie(): ?Catégorie
    {
        return $this->catégorie;
    }

    public function setCatégorie(Catégorie $catégorie): static
    {
        // set the owning side of the relation if necessary
        if ($catégorie->getTechnos() !== $this) {
            $catégorie->setTechnos($this);
        }

        $this->catégorie = $catégorie;

        return $this;
    }

    /**
     * @return Collection<int, Projet>
     */
    public function getProjets(): Collection
    {
        return $this->projets;
    }

    public function addProjet(Projet $projet): static
    {
        if (!$this->projets->contains($projet)) {
            $this->projets->add($projet);
            $projet->addTechno($this);
        }

        return $this;
    }

    public function removeProjet(Projet $projet): static
    {
        if ($this->projets->removeElement($projet)) {
            $projet->removeTechno($this);
        }

        return $this;
    }

    public function getImageTechno(): ?ImageTechno
    {
        return $this->imageTechno;
    }

    public function setImageTechno(ImageTechno $imageTechno): static
    {
        // set the owning side of the relation if necessary
        if ($imageTechno->getTechno() !== $this) {
            $imageTechno->setTechno($this);
        }

        $this->imageTechno = $imageTechno;

        return $this;
    }
}
