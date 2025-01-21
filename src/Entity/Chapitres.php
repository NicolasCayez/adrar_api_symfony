<?php

namespace App\Entity;

use App\Repository\ChapitresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChapitresRepository::class)]
#[ApiResource]
class Chapitres
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contenu = null;

    #[ORM\Column]
    private ?int $position = null;

    /**
     * @var Collection<int, UtilisateurChapitre>
     */
    #[ORM\OneToMany(targetEntity: UtilisateurChapitre::class, mappedBy: 'id_chapitre')]
    private Collection $utilisateurChapitres;

    #[ORM\ManyToOne(inversedBy: 'chapitres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cours $id_cours = null;

    public function __construct()
    {
        $this->utilisateurChapitres = new ArrayCollection();
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

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): static
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): static
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return Collection<int, UtilisateurChapitre>
     */
    public function getUtilisateurChapitres(): Collection
    {
        return $this->utilisateurChapitres;
    }

    public function addUtilisateurChapitre(UtilisateurChapitre $utilisateurChapitre): static
    {
        if (!$this->utilisateurChapitres->contains($utilisateurChapitre)) {
            $this->utilisateurChapitres->add($utilisateurChapitre);
            $utilisateurChapitre->setIdChapitre($this);
        }

        return $this;
    }

    public function removeUtilisateurChapitre(UtilisateurChapitre $utilisateurChapitre): static
    {
        if ($this->utilisateurChapitres->removeElement($utilisateurChapitre)) {
            // set the owning side to null (unless already changed)
            if ($utilisateurChapitre->getIdChapitre() === $this) {
                $utilisateurChapitre->setIdChapitre(null);
            }
        }

        return $this;
    }

    public function getIdCours(): ?Cours
    {
        return $this->id_cours;
    }

    public function setIdCours(?Cours $id_cours): static
    {
        $this->id_cours = $id_cours;

        return $this;
    }
}
