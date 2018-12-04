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

    public function __construct()
    {
        $this->posseders = new ArrayCollection();
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
}
