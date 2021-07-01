<?php

namespace App\Entity;

use App\Repository\ArtistRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArtistRepository::class)
 */
class Artist
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $concert;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="artists")
     */
    private $category;

    private $color;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dateconcert;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $plagehoraire;

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getConcert(): ?int
    {
        return $this->concert;
    }

    public function setConcert(int $concert): self
    {
        $this->concert = $concert;

        return $this;
    }
    public function __toString()
    {
        return $this->name;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getDateconcert(): ?string
    {
        return $this->dateconcert;
    }

    public function setDateconcert(?string $dateconcert): self
    {
        $this->dateconcert = $dateconcert;

        return $this;
    }

    public function getPlagehoraire(): ?string
    {
        return $this->plagehoraire;
    }

    public function setPlagehoraire(?string $plagehoraire): self
    {
        $this->plagehoraire = $plagehoraire;

        return $this;
    }
}
