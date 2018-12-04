<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PraticienRepository")
 */
class Praticien
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $pra_num;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pra_nom;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $pra_adr;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $pra_CP;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pra_ville;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $pra_coefnotoriete;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypePraticient", inversedBy="praticiens")
     */
    private $Type_code;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Posseder", mappedBy="praticiens")
     */
    private $specialite;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $avatar;

    public function __construct()
    {
        $this->specialite = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getpraNom(): ?string
    {
        return $this->pra_nom;
    }

    public function setpraNom(string $pra_nom): self
    {
        $this->pra_nom = $pra_nom;

        return $this;
    }

    public function getpraAdr(): ?string
    {
        return $this->pra_adr;
    }

    public function setpraAdr(?string $pra_adr): self
    {
        $this->pra_adr = $pra_adr;

        return $this;
    }

    public function getpraCP(): ?int
    {
        return $this->pra_CP;
    }

    public function setpraCP(?int $pra_CP): self
    {
        $this->pra_CP = $pra_CP;

        return $this;
    }

    public function getpraVille(): ?string
    {
        return $this->pra_ville;
    }

    public function setpraVille(?string $pra_ville): self
    {
        $this->pra_ville = $pra_ville;

        return $this;
    }

    public function getpraCoefnotoriete(): ?float
    {
        return $this->pra_coefnotoriete;
    }

    public function setpraCoefnotoriete(?float $pra_coefnotoriete): self
    {
        $this->pra_coefnotoriete = $pra_coefnotoriete;

        return $this;
    }

    public function getTypeCode(): ?Typepraticient
    {
        return $this->Type_code;
    }

    public function setTypeCode(?Typepraticient $Type_code): self
    {
        $this->Type_code = $Type_code;

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
    public function getSpecialite(): Collection
    {
        return $this->specialite;
    }

    public function addSpecialite(Posseder $specialite): self
    {
        if (!$this->specialite->contains($specialite)) {
            $this->specialite[] = $specialite;
            $specialite->setpraticiens($this);
        }

        return $this;
    }

    public function removeSpecialite(Posseder $specialite): self
    {
        if ($this->specialite->contains($specialite)) {
            $this->specialite->removeElement($specialite);
            // set the owning side to null (unless already changed)
            if ($specialite->getpraticiens() === $this) {
                $specialite->setpraticiens(null);
            }
        }

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }
}
