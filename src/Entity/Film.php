<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: FilmRepository::class)]
class Film
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Titre = null;

    #[ORM\Column]
    private ?int $Sortie = null;

    #[ORM\Column(length: 255)]
    private ?string $Realisateur = null;

    #[ORM\Column]
    private ?int $Box_office = null;

    #[ORM\OneToMany(mappedBy: 'film', targetEntity: Note::class)]
    private Collection $notes;

    public function __construct()
    {
        $this->notes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): static
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getSortie(): ?int
    {
        return $this->Sortie;
    }

    public function setSortie(int $Sortie): static
    {
        $this->Sortie = $Sortie;

        return $this;
    }

    public function getRealisateur(): ?string
    {
        return $this->Realisateur;
    }

    public function setRealisateur(string $Realisateur): static
    {
        $this->Realisateur = $Realisateur;

        return $this;
    }

    public function getBoxOffice(): ?int
    {
        return $this->Box_office;
    }

    public function setBoxOffice(int $Box_office): static
    {
        $this->Box_office = $Box_office;

        return $this;
    }

    /**
     * @return Collection<int, Note>
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    public function addNote(Note $note): static
    {
        if (!$this->notes->contains($note)) {
            $this->notes->add($note);
            $note->setFilm($this);
        }

        return $this;
    }

    public function removeNote(Note $note): static
    {
        if ($this->notes->removeElement($note)) {
            // set the owning side to null (unless already changed)
            if ($note->getFilm() === $this) {
                $note->setFilm(null);
            }
        }

        return $this;
    }
}