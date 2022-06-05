<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'string', length: 255)]
    private $prenom;

    #[ORM\Column(type: 'string', length: 255)]
    private $date;

    #[ORM\Column(type: 'string',length: 255)]
    private $heure;

    #[ORM\Column(type: 'string', length: 255)]
    private $compagnie;

    #[ORM\Column(type: 'string', length: 255)]
    private $n_vol;

    #[ORM\Column(type: 'string', length: 255)]
    private $n_bagages;

    #[ORM\Column(type: 'string', length: 255)]
    private $n_accompagne;

    #[ORM\Column(type: 'string', length: 255)]
    private $telephone;

    #[ORM\Column(type: 'string', length: 255)]
    private $n_passager;

    #[ORM\Column(type: 'string', length: 255)]
    private $email;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHeure(): ?string
    {
        return $this->heure;
    }

    public function setHeure(string $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getCompagnie(): ?string
    {
        return $this->compagnie;
    }

    public function setCompagnie(string $compagnie): self
    {
        $this->compagnie = $compagnie;

        return $this;
    }

    public function getNVol(): ?string
    {
        return $this->n_vol;
    }

    public function setNVol(string $n_vol): self
    {
        $this->n_vol = $n_vol;

        return $this;
    }

    public function getNBagages(): ?string
    {
        return $this->n_bagages;
    }

    public function setNBagages(string $n_bagages): self
    {
        $this->n_bagages = $n_bagages;

        return $this;
    }

    public function getNAccompagne(): ?string
    {
        return $this->n_accompagne;
    }

    public function setNAccompagne(string $n_accompagne): self
    {
        $this->n_accompagne = $n_accompagne;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getNPassager(): ?string
    {
        return $this->n_passager;
    }

    public function setNPassager(string $n_passager): self
    {
        $this->n_passager = $n_passager;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
