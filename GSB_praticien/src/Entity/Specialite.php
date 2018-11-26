<?php

namespace App\Entity;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Posseder", inversedBy="specialites")
     */
    private $posseder;

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
}
