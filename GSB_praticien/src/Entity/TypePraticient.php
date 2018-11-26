<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypePraticientRepository")
 */
class TypePraticient
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
    private $type_code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_Libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_Lieu;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Praticien", mappedBy="Type_code")
     */
    private $praticiens;

    public function __construct()
    {
        $this->praticiens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeCode(): ?int
    {
        return $this->type_code;
    }

    public function setTypeCode(int $type_code): self
    {
        $this->type_code = $type_code;

        return $this;
    }

    public function getTypeLibelle(): ?string
    {
        return $this->type_Libelle;
    }

    public function setTypeLibelle(string $type_Libelle): self
    {
        $this->type_Libelle = $type_Libelle;

        return $this;
    }

    public function getTypeLieu(): ?string
    {
        return $this->type_Lieu;
    }

    public function setTypeLieu(string $type_Lieu): self
    {
        $this->type_Lieu = $type_Lieu;

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
            $praticien->setTypeCode($this);
        }

        return $this;
    }

    public function removePraticien(Praticien $praticien): self
    {
        if ($this->praticiens->contains($praticien)) {
            $this->praticiens->removeElement($praticien);
            // set the owning side to null (unless already changed)
            if ($praticien->getTypeCode() === $this) {
                $praticien->setTypeCode(null);
            }
        }

        return $this;
    }
}
