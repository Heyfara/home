<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entity used to store wood pellet consumption
 * A new entity is (manually) stored when the boiler is filled
 *
 * @ORM\Entity(repositoryClass="App\Repository\PelletRecordRepository")
 */
class PelletRecord
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Number of pellet bags added to the boiler
     *
     * @ORM\Column(type="integer")
     */
    private $bags;

    /**
     * Day of boiler filling
     *
     * @ORM\Column(type="datetime")
     */
    private $date;

    public function __construct()
    {
        $this->date = new \DateTime('now');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBags(): ?int
    {
        return $this->bags;
    }

    public function setBags(int $bags): self
    {
        $this->bags = $bags;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
