<?php

namespace App\Entity;

use App\Repository\EstimationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EstimationRepository::class)
 */
class Estimation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateEstimation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Description;

    /**
     * @ORM\ManyToOne(targetEntity=CommissairePriseur::class, inversedBy="estimations")
     */
    private $idCommissaire;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="estimations")
     */
    private $idProduit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEstimation(): ?\DateTimeInterface
    {
        return $this->dateEstimation;
    }

    public function setDateEstimation(\DateTimeInterface $dateEstimation): self
    {
        $this->dateEstimation = $dateEstimation;

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

    public function getIdCommissaire(): ?CommissairePriseur
    {
        return $this->idCommissaire;
    }

    public function setIdCommissaire(?CommissairePriseur $idCommissaire): self
    {
        $this->idCommissaire = $idCommissaire;

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
    public function __toString()
    {
        return (string)($this->getDescription());
    }

}
