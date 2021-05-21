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
     * @ORM\ManyToOne(targetEntity=Lot::class, inversedBy="offres")
     */
    private $lot;

    /**
     * @ORM\Column(type="date")
     */
    private $dateOffre;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $heureOffre;

    /**
     * @ORM\ManyToOne(targetEntity=Acheteur::class, inversedBy="offres")
     */
    private $acheteur;

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

    public function getLot(): ?Lot
    {
        return $this->lot;
    }

    public function setLot(?Lot $lot): self
    {
        $this->lot = $lot;

        return $this;
    }

    public function getDateOffre(): ?\DateTimeInterface
    {
        return $this->dateOffre;
    }

    public function setDateOffre(\DateTimeInterface $dateOffre): self
    {
        $this->dateOffre = $dateOffre;

        return $this;
    }

    public function getHeureOffre(): ?\DateTimeInterface
    {
        return $this->heureOffre;
    }

    public function setHeureOffre(?\DateTimeInterface $heureOffre): self
    {
        $this->heureOffre = $heureOffre;

        return $this;
    }

    public function getAcheteur(): ?Acheteur
    {
        return $this->acheteur;
    }

    public function setAcheteur(?Acheteur $acheteur): self
    {
        $this->acheteur = $acheteur;

        return $this;
    }
}
