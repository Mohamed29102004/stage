<?php

namespace App\Entity;

use App\Repository\PageRepository;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PageRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Page
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
    private ?string $Description = null;

    #[ORM\Column]
    private ?bool $isMenu = false;

    #[ORM\OneToMany(mappedBy: 'idPage', targetEntity: Article::class)]
    private Collection $articles;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function IntializeSlug() {
        $Slugify = new Slugify();
        $this->slug = $Slugify->Slugify($this->Nom);
    }

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

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function isIsMenu(): ?bool
    {
        return $this->isMenu;
    }

    public function setIsMenu(bool $isMenu): static
    {
        $this->isMenu = $isMenu;

        return $this;
    }

    /**
     * @return Collection<int, Article>
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): static
    {
        if (!$this->articles->contains($article)) {
            $this->articles->add($article);
            $article->setIdPage($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): static
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getIdPage() === $this) {
                $article->setIdPage(null);
            }
        }

        return $this;
    }
    
    public function __toString() {
        return $this->Nom;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }
}
