<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AccommodationRepository")
 */
class Accommodation
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
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $numbPlace;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2)
     */
    private $surface;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $internet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $priceWeek;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\StatusAcco", inversedBy="accommodations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $statusAcco;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeAcco", inversedBy="accommodations")
     */
    private $typeAcco;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getNumbPlace(): ?int
    {
        return $this->numbPlace;
    }

    public function setNumbPlace(int $numbPlace): self
    {
        $this->numbPlace = $numbPlace;

        return $this;
    }

    public function getSurface()
    {
        return $this->surface;
    }

    public function setSurface($surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getInternet(): ?bool
    {
        return $this->internet;
    }

    public function setInternet(?bool $internet): self
    {
        $this->internet = $internet;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPriceWeek()
    {
        return $this->priceWeek;
    }

    public function setPriceWeek($priceWeek): self
    {
        $this->priceWeek = $priceWeek;

        return $this;
    }

    public function getStatusAcco(): ?StatusAcco
    {
        return $this->statusAcco;
    }

    public function setStatusAcco(?StatusAcco $statusAcco): self
    {
        $this->statusAcco = $statusAcco;

        return $this;
    }

    public function getTypeAcco(): ?TypeAcco
    {
        return $this->typeAcco;
    }

    public function setTypeAcco(?TypeAcco $typeAcco): self
    {
        $this->typeAcco = $typeAcco;

        return $this;
    }
}
