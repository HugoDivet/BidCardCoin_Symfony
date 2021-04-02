<?php

namespace App\Entity;

use App\Repository\AcheteurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AcheteurRepository::class)
 */
class Acheteur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $Solvable;

    /**
     * @ORM\OneToOne(targetEntity=Utilisateur::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idUtilisateur;

    /**
     * @ORM\OneToOne(targetEntity=Offre::class, mappedBy="idAcheteur", cascade={"persist", "remove"})
     */
    private $offres;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSolvable(): ?bool
    {
        return $this->Solvable;
    }

    public function setSolvable(?bool $Solvable): self
    {
        $this->Solvable = $Solvable;

        return $this;
    }

    public function getIdUtilisateur(): ?Utilisateur
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(Utilisateur $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

    public function getOffres(): ?Offre
    {
        return $this->offres;
    }

    public function setOffres(?Offre $offres): self
    {
        // unset the owning side of the relation if necessary
        if ($offres === null && $this->offres !== null) {
            $this->offres->setIdAcheteur(null);
        }

        // set the owning side of the relation if necessary
        if ($offres !== null && $offres->getIdAcheteur() !== $this) {
            $offres->setIdAcheteur($this);
        }

        $this->offres = $offres;

        return $this;
    }

    public function __toString()
    {
    }

}
