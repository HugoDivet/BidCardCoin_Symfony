<?php

namespace App\Entity;

use App\Repository\LotRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LotRepository::class)
 */
class Lot
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Description;

    /**
     * @ORM\OneToMany(targetEntity=Produit::class, mappedBy="idLot")
     */
    private $produits;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prix_depart;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_sold;

    /**
     * @ORM\OneToMany(targetEntity=Offre::class, mappedBy="lot")
     */
    private $offres;

    /**
     * @ORM\ManyToOne(targetEntity=Vente::class, inversedBy="lots")
     */
    private $vente;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
        $this->offres = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
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
            $produit->setIdLot($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getIdLot() === $this) {
                $produit->setIdLot(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return (string)($this->getNom());
    }

    public function getPrixDepart(): ?float
    {
        return $this->prix_depart;
    }

    public function setPrixDepart(?float $prix_depart): self
    {
        $this->prix_depart = $prix_depart;

        return $this;
    }

    public function getIsSold(): ?bool
    {
        return $this->is_sold;
    }

    public function setIsSold(?bool $is_sold): self
    {
        $this->is_sold = $is_sold;

        return $this;
    }

    /**
     * @return Collection|Offre[]
     */
    public function getOffres(): Collection
    {
        return $this->offres;
    }

    public function addOffre(Offre $offre): self
    {
        if (!$this->offres->contains($offre)) {
            $this->offres[] = $offre;
            $offre->setLot($this);
        }

        return $this;
    }

    public function removeOffre(Offre $offre): self
    {
        if ($this->offres->removeElement($offre)) {
            // set the owning side to null (unless already changed)
            if ($offre->getLot() === $this) {
                $offre->setLot(null);
            }
        }

        return $this;
    }

    public function getVente(): ?Vente
    {
        return $this->vente;
    }

    public function setVente(?Vente $vente): self
    {
        $this->vente = $vente;

        return $this;
    }

}
