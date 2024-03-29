<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Auteur = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $PublicationAt = null;

    #[ORM\Column(length: 255)]
    private ?string $Descriptif = null;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    private ?Page $idPage = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $content = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuteur(): ?string
    {
        return $this->Auteur;
    }

    public function setAuteur(string $Auteur): static
    {
        $this->Auteur = $Auteur;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPublicationAt(): ?\DateTimeImmutable
    {
        return $this->PublicationAt;
    }

    public function setPublicationAt(\DateTimeImmutable $PublicationAt): static
    {
        $this->PublicationAt = $PublicationAt;

        return $this;
    }

    public function getDescriptif(): ?string
    {
        return $this->Descriptif;
    }

    public function setDescriptif(string $Descriptif): static
    {
        $this->Descriptif = $Descriptif;

        return $this;
    }

    public function getIdPage(): ?Page
    {
        return $this->idPage;
    }

    public function setIdPage(?Page $idPage): static
    {
        $this->idPage = $idPage;

        return $this;
    }

    public function __toString() {
        return $this->Nom;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): static
    {
        $this->content = $content;

        return $this;
    }
}
