<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReservationRepository")
 */
class Reservation
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
    private $reservationDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $arrhesDate;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $arrhesAmount;

    /**
     * @ORM\Column(type="integer")
     */
    private $numbOccupant;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $priceWeek;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReservationDate(): ?\DateTimeInterface
    {
        return $this->reservationDate;
    }

    public function setReservationDate(\DateTimeInterface $reservationDate): self
    {
        $this->reservationDate = $reservationDate;

        return $this;
    }

    public function getArrhesDate(): ?\DateTimeInterface
    {
        return $this->arrhesDate;
    }

    public function setArrhesDate(?\DateTimeInterface $arrhesDate): self
    {
        $this->arrhesDate = $arrhesDate;

        return $this;
    }

    public function getArrhesAmount()
    {
        return $this->arrhesAmount;
    }

    public function setArrhesAmount($arrhesAmount): self
    {
        $this->arrhesAmount = $arrhesAmount;

        return $this;
    }

    public function getNumbOccupant(): ?int
    {
        return $this->numbOccupant;
    }

    public function setNumbOccupant(int $numbOccupant): self
    {
        $this->numbOccupant = $numbOccupant;

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
}
