<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComptebancaireRepository")
 */
class Comptebancaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Depot", inversedBy="comptebancaires")
     */
    private $iddepot;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Partenaire", inversedBy="comptebancaires")
     */
    private $idpartenaire;

   

  
    public function getId(): ?int
    {
        return $this->id;
    }

   
  

    public function getIddepot(): ?Depot
    {
        return $this->iddepot;
    }

    public function setIddepot(?Depot $iddepot): self
    {
        $this->iddepot = $iddepot;

        return $this;
    }

    public function getIdpartenaire(): ?Partenaire
    {
        return $this->idpartenaire;
    }

    public function setIdpartenaire(?Partenaire $idpartenaire): self
    {
        $this->idpartenaire = $idpartenaire;

        return $this;
    }

  
}
