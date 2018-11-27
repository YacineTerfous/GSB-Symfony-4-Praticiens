<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PossederRepository")
 * @ORM\Table(uniqueConstraints={
        * @ORM\UniqueConstraint(name="posseder_unique", columns={"praticiens_id", "specialite_id"})
        * })
 */
class Posseder
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
    private $Pos_diplome;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Praticien", inversedBy="specialite")
     */
    private $praticiens;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Specialite", inversedBy="posseders")
     */
    private $specialite;

    public function __construct()
    {
        $this->praticiens = new ArrayCollection();
        $this->specialites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPosDiplome(): ?\DateTimeInterface
    {
        return $this->Pos_diplome;
    }

    public function setPosDiplome(\DateTimeInterface $Pos_diplome): self
    {
        $this->Pos_diplome = $Pos_diplome;

        return $this;
    }

    /**
     * @return Collection|Praticien[]
     */
    public function getPraticiens(): Collection
    {
        return $this->praticiens;
    }

    public function addPraticien(Praticien $praticien): self
    {
        if (!$this->praticiens->contains($praticien)) {
            $this->praticiens[] = $praticien;
            $praticien->setPosseder($this);
        }

        return $this;
    }

    public function removePraticien(Praticien $praticien): self
    {
        if ($this->praticiens->contains($praticien)) {
            $this->praticiens->removeElement($praticien);
            // set the owning side to null (unless already changed)
            if ($praticien->getPosseder() === $this) {
                $praticien->setPosseder(null);
            }
        }

        return $this;
    }


    public function setPraticiens(?Praticien $praticiens): self
    {
        $this->praticiens = $praticiens;

        return $this;
    }

    public function getSpecialite(): ?Specialite
    {
        return $this->specialite;
    }

    public function setSpecialite(?Specialite $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }
}
