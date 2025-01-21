<?php

namespace App\Entity;

use App\Repository\UtilisateurChapitreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurChapitreRepository::class)]
#[ApiResource]
class UtilisateurChapitre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'utilisateurChapitres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $id_user = null;

    #[ORM\ManyToOne(inversedBy: 'utilisateurChapitres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Chapitres $id_chapitre = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $chapitre_date_inscription = null;

    #[ORM\Column]
    private ?bool $chapitre_termine = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?User
    {
        return $this->id_user;
    }

    public function setIdUser(?User $id_user): static
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getIdChapitre(): ?Chapitres
    {
        return $this->id_chapitre;
    }

    public function setIdChapitre(?Chapitres $id_chapitre): static
    {
        $this->id_chapitre = $id_chapitre;

        return $this;
    }

    public function getChapitreDateInscription(): ?\DateTimeInterface
    {
        return $this->chapitre_date_inscription;
    }

    public function setChapitreDateInscription(\DateTimeInterface $chapitre_date_inscription): static
    {
        $this->chapitre_date_inscription = $chapitre_date_inscription;

        return $this;
    }

    public function isChapitreTermine(): ?bool
    {
        return $this->chapitre_termine;
    }

    public function setChapitreTermine(bool $chapitre_termine): static
    {
        $this->chapitre_termine = $chapitre_termine;

        return $this;
    }
}
