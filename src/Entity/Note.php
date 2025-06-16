<?php

namespace App\Entity;

use App\Repository\NoteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NoteRepository::class)]
class Note
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Note = null;

    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $date_critique = null;

    #[ORM\ManyToOne(inversedBy: 'notes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Film $film = null;

    #[ORM\ManyToOne(inversedBy: 'notes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Critique $critique = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?int
    {
        return $this->Note;
    }

    public function setNote(int $Note): static
    {
        $this->Note = $Note;

        return $this;
    }

    public function getDateCritique(): ?\DateTimeInterface
    {
        return $this->date_critique;
    }

    public function setDateCritique(\DateTimeInterface $date_critique): static
    {
        $this->date_critique = $date_critique;

        return $this;
    }

    public function getFilm(): ?Film
    {
        return $this->film;
    }

    public function setFilm(?Film $film): static
    {
        $this->film = $film;

        return $this;
    }

    public function getCritique(): ?Critique
    {
        return $this->critique;
    }

    public function setCritique(?Critique $critique): static
    {
        $this->critique = $critique;

        return $this;
    }
}