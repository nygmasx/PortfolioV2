<?php

namespace App\Entity;

use App\Repository\CatégorieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CatégorieRepository::class)]
class Catégorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToOne(inversedBy: 'catégorie', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Techno $technos = null;

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

    public function getTechnos(): ?Techno
    {
        return $this->technos;
    }

    public function setTechnos(Techno $technos): static
    {
        $this->technos = $technos;

        return $this;
    }
}
