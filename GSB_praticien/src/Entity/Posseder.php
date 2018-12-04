<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PossederRepository")
 * @ORM\Table(uniqueConstraints={
 * @ORM\UniqueConstraint(name="posseder_unique", columns={"praticiens_num", "specialite_id"})
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Specialite", inversedBy="posseder2")
     * @ORM\JoinColumn(nullable=false)
     */
    private $specialite;

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
