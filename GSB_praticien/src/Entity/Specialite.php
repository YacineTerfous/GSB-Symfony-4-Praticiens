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
    private $spe_code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $spe_libelle;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Posseder", mappedBy="specialite")
     */
    private $posseders;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Posseder", mappedBy="specialite", orphanRemoval=true)
     */
    private $posseder2;

    public function __construct()
    {
        $this->posseders = new ArrayCollection();
        $this->posseder2 = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getspeCode(): ?int
    {
        return $this->spe_code;
    }

    public function setspeCode(int $spe_code): self
    {
        $this->spe_code = $spe_code;

        return $this;
    }

    public function getspeLibelle(): ?string
    {
        return $this->spe_libelle;
    }

    public function setspeLibelle(string $spe_libelle): self
    {
        $this->spe_libelle = $spe_libelle;

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
            $posseder->setspecialite($this);
        }

        return $this;
    }

    public function removePosseder(Posseder $posseder): self
    {
        if ($this->posseders->contains($posseder)) {
            $this->posseders->removeElement($posseder);
            // set the owning side to null (unless already changed)
            if ($posseder->getspecialite() === $this) {
                $posseder->setspecialite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Posseder[]
     */
    public function getPosseder2(): Collection
    {
        return $this->posseder2;
    }

    public function addPosseder2(Posseder $posseder2): self
    {
        if (!$this->posseder2->contains($posseder2)) {
            $this->posseder2[] = $posseder2;
            $posseder2->setSpecialite($this);
        }

        return $this;
    }

    public function removePosseder2(Posseder $posseder2): self
    {
        if ($this->posseder2->contains($posseder2)) {
            $this->posseder2->removeElement($posseder2);
            // set the owning side to null (unless already changed)
            if ($posseder2->getSpecialite() === $this) {
                $posseder2->setSpecialite(null);
            }
        }

        return $this;
    }
}
