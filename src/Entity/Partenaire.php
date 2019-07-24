<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PartenaireRepository")
 */
class Partenaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

   

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $raisonsociale;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ninea;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseentreprise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateur", inversedBy="partenaires")
     */
    private $idutilisateur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comptebancaire", mappedBy="idpartenaire")
     */
    private $comptebancaires;

    public function __construct()
    {
        $this->comptebancaires = new ArrayCollection();
    }

  
  
  

    public function getRaisonsociale(): ?string
    {
        return $this->raisonsociale;
    }

    public function setRaisonsociale(string $raisonsociale): self
    {
        $this->raisonsociale = $raisonsociale;

        return $this;
    }

    public function getNinea(): ?string
    {
        return $this->ninea;
    }

    public function setNinea(string $ninea): self
    {
        $this->ninea = $ninea;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAdresseentreprise(): ?string
    {
        return $this->adresseentreprise;
    }

    public function setAdresseentreprise(string $adresseentreprise): self
    {
        $this->adresseentreprise = $adresseentreprise;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

   
    public function getIdutilisateur(): ?Utilisateur
    {
        return $this->idutilisateur;
    }

    public function setIdutilisateur(?Utilisateur $idutilisateur): self
    {
        $this->idutilisateur = $idutilisateur;

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
            $comptebancaire->setIdpartenaire($this);
        }

        return $this;
    }

    public function removeComptebancaire(Comptebancaire $comptebancaire): self
    {
        if ($this->comptebancaires->contains($comptebancaire)) {
            $this->comptebancaires->removeElement($comptebancaire);
            // set the owning side to null (unless already changed)
            if ($comptebancaire->getIdpartenaire() === $this) {
                $comptebancaire->setIdpartenaire(null);
            }
        }

        return $this;
    }
}
