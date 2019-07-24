<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\TypeRepository")
 */
class Type
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
    private $libelletype;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Utilisateur", mappedBy="type")
     */
    private $idutilisateur;

    public function __construct()
    {
        $this->idutilisateur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelletype(): ?string
    {
        return $this->libelletype;
    }

    public function setLibelletype(string $libelletype): self
    {
        $this->libelletype = $libelletype;

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
            $idutilisateur->setType($this);
        }

        return $this;
    }

    public function removeIdutilisateur(Utilisateur $idutilisateur): self
    {
        if ($this->idutilisateur->contains($idutilisateur)) {
            $this->idutilisateur->removeElement($idutilisateur);
            // set the owning side to null (unless already changed)
            if ($idutilisateur->getType() === $this) {
                $idutilisateur->setType(null);
            }
        }

        return $this;
    }
}
