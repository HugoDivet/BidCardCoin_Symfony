<?php

namespace App\Entity;

use App\Repository\OffreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OffreRepository::class)
 */
class Offre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $OffreAcheteur;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="offres")
     */
    private $idProduit;

    /**
     * @ORM\OneToOne(targetEntity=Acheteur::class, inversedBy="offres", cascade={"persist", "remove"})
     */
    private $idAcheteur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOffreAcheteur(): ?float
    {
        return $this->OffreAcheteur;
    }

    public function setOffreAcheteur(?float $OffreAcheteur): self
    {
        $this->OffreAcheteur = $OffreAcheteur;

        return $this;
    }

    public function getIdProduit(): ?Produit
    {
        return $this->idProduit;
    }

    public function setIdProduit(?Produit $idProduit): self
    {
        $this->idProduit = $idProduit;

        return $this;
    }

    public function getIdAcheteur(): ?Acheteur
    {
        return $this->idAcheteur;
    }

    public function setIdAcheteur(?Acheteur $idAcheteur): self
    {
        $this->idAcheteur = $idAcheteur;

        return $this;
    }
}
