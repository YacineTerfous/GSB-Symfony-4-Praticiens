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
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Pra_num;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Pra_nom;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Pra_adr;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Pra_CP;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Pra_ville;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Pra_coefnotoriete;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypePraticient", inversedBy="praticiens")
     */
    private $Type_code;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Posseder", mappedBy="praticiens")
     */
    private $specialite;

    public function __construct()
    {
        $this->specialite = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPraNom(): ?string
    {
        return $this->Pra_nom;
    }

    public function setPraNom(string $Pra_nom): self
    {
        $this->Pra_nom = $Pra_nom;

        return $this;
    }

    public function getPraAdr(): ?string
    {
        return $this->Pra_adr;
    }

    public function setPraAdr(?string $Pra_adr): self
    {
        $this->Pra_adr = $Pra_adr;

        return $this;
    }

    public function getPraCP(): ?int
    {
        return $this->Pra_CP;
    }

    public function setPraCP(?int $Pra_CP): self
    {
        $this->Pra_CP = $Pra_CP;

        return $this;
    }

    public function getPraVille(): ?string
    {
        return $this->Pra_ville;
    }

    public function setPraVille(?string $Pra_ville): self
    {
        $this->Pra_ville = $Pra_ville;

        return $this;
    }

    public function getPraCoefnotoriete(): ?float
    {
        return $this->Pra_coefnotoriete;
    }

    public function setPraCoefnotoriete(?float $Pra_coefnotoriete): self
    {
        $this->Pra_coefnotoriete = $Pra_coefnotoriete;

        return $this;
    }

    public function getTypeCode(): ?TypePraticient
    {
        return $this->Type_code;
    }

    public function setTypeCode(?TypePraticient $Type_code): self
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
            $specialite->setPraticiens($this);
        }

        return $this;
    }

    public function removeSpecialite(Posseder $specialite): self
    {
        if ($this->specialite->contains($specialite)) {
            $this->specialite->removeElement($specialite);
            // set the owning side to null (unless already changed)
            if ($specialite->getPraticiens() === $this) {
                $specialite->setPraticiens(null);
            }
        }

        return $this;
    }
}
