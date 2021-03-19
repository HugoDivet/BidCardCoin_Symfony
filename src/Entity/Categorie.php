<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
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
    private $Nom;

    /**
     * @ORM\ManyToMany(targetEntity=Categorie::class)
     */
    private $idCategories;

    /**
     * @ORM\ManyToMany(targetEntity=Produit::class, mappedBy="idCategorie")
     */
    private $produits;

    public function __construct()
    {
        $this->idCategories = new ArrayCollection();
        $this->produits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getIdCategories(): Collection
    {
        return $this->idCategories;
    }

    public function addIdCategory(self $idCategory): self
    {
        if (!$this->idCategories->contains($idCategory)) {
            $this->idCategories[] = $idCategory;
        }

        return $this;
    }

    public function removeIdCategory(self $idCategory): self
    {
        $this->idCategories->removeElement($idCategory);

        return $this;
    }

    public function __toString()
    {
        return (string)($this->getNom());
    }

    /**
     * @return Collection|Produit[]
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits[] = $produit;
            $produit->addIdCategorie($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->removeElement($produit)) {
            $produit->removeIdCategorie($this);
        }

        return $this;
    }

}
