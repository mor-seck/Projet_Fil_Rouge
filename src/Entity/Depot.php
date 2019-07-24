<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\DepotRepository")
 */
class Depot
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $datedepot;

    /**
     * @ORM\Column(type="bigint")
     */
    private $montantdepot;

   

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comptebancaire", mappedBy="iddepot")
     */
    private $comptebancaires;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Utilisateur", mappedBy="depot")
     */
    private $idutilisateur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateur", inversedBy="depots")
     */
    private $Idutilisateur;

    public function __construct()
    {
        $this->idutilisateur = new ArrayCollection();
    }

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatedepot(): ?\DateTimeInterface
    {
        return $this->datedepot;
    }

    public function setDatedepot(\DateTimeInterface $datedepot): self
    {
        $this->datedepot = $datedepot;

        return $this;
    }

    public function getMontantdepot(): ?int
    {
        return $this->montantdepot;
    }

    public function setMontantdepot(int $montantdepot): self
    {
        $this->montantdepot = $montantdepot;

        return $this;
    }

   


    /**
     * @return Collection|Comptebancaire[]
     */
    public function getComptebancaires(): Collection
    {
        return $this->comptebancaires;
    }

    public function addComptebancaire(Comptebancaire $comptebancaire): self
    {
        if (!$this->comptebancaires->contains($comptebancaire)) {
            $this->comptebancaires[] = $comptebancaire;
            $comptebancaire->setIddepot($this);
        }

        return $this;
    }

    public function removeComptebancaire(Comptebancaire $comptebancaire): self
    {
        if ($this->comptebancaires->contains($comptebancaire)) {
            $this->comptebancaires->removeElement($comptebancaire);
            // set the owning side to null (unless already changed)
            if ($comptebancaire->getIddepot() === $this) {
                $comptebancaire->setIddepot(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getIdutilisateur(): Collection
    {
        return $this->idutilisateur;
    }

    public function addIdutilisateur(Utilisateur $idutilisateur): self
    {
        if (!$this->idutilisateur->contains($idutilisateur)) {
            $this->idutilisateur[] = $idutilisateur;
            $idutilisateur->setDepot($this);
        }

        return $this;
    }

    public function removeIdutilisateur(Utilisateur $idutilisateur): self
    {
        if ($this->idutilisateur->contains($idutilisateur)) {
            $this->idutilisateur->removeElement($idutilisateur);
            // set the owning side to null (unless already changed)
            if ($idutilisateur->getDepot() === $this) {
                $idutilisateur->setDepot(null);
            }
        }

        return $this;
    }

    public function setIdutilisateur(?Utilisateur $Idutilisateur): self
    {
        $this->Idutilisateur = $Idutilisateur;

        return $this;
    }
}
