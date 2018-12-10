<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AcceuilRepository")
 */
class Acceuil
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
    private $Acceuil;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAcceuil(): ?string
    {
        return $this->Acceuil;
    }

    public function setAcceuil(string $Acceuil): self
    {
        $this->Acceuil = $Acceuil;

        return $this;
    }
}
