<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SpecialiteRepository")
 */
class Specialite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Spe_code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Spe_libelle;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Posseder", mappedBy="specialite")
     */
    private $posseders;

    public function __construct()
    {
        $this->posseders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpeCode(): ?int
    {
        return $this->Spe_code;
    }

    public function setSpeCode(int $Spe_code): self
    {
        $this->Spe_code = $Spe_code;

        return $this;
    }

    public function getSpeLibelle(): ?string
    {
        return $this->Spe_libelle;
    }

    public function setSpeLibelle(string $Spe_libelle): self
    {
        $this->Spe_libelle = $Spe_libelle;

        return $this;
    }

    public function getPosseder(): ?Posseder
    {
        return $this->posseder;
    }

    public function setPosseder(?Posseder $posseder): self
    {
        $this->posseder = $posseder;

        return $this;
    }

    /**
     * @return Collection|Posseder[]
     */
    public function getPosseders(): Collection
    {
        return $this->posseders;
    }

    public function addPosseder(Posseder $posseder): self
    {
        if (!$this->posseders->contains($posseder)) {
            $this->posseders[] = $posseder;
            $posseder->setSpecialite($this);
        }

        return $this;
    }

    public function removePosseder(Posseder $posseder): self
    {
        if ($this->posseders->contains($posseder)) {
            $this->posseders->removeElement($posseder);
            // set the owning side to null (unless already changed)
            if ($posseder->getSpecialite() === $this) {
                $posseder->setSpecialite(null);
            }
        }

        return $this;
    }
}
