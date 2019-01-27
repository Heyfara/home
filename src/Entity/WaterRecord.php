<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entity used to store water consumption
 * A new entity is created every x seconds (defined by the python script)
 *
 * @ORM\Entity(repositoryClass="App\Repository\WaterRecordRepository")
 */
class WaterRecord
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Volume of water displayed on the water meter
     *
     * The volume is the total volume indicated by the 
     * water meter and not the amount used since the last record
     *
     * @ORM\Column(type="integer")
     */
    private $volume;

    /**
     * Datetime of the record
     *
     * @ORM\Column(type="datetime")
     */
    private $date;

    public function __construct($volume)
    {
        $this->volume = $volume;
        $this->date = new \DateTime('now');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVolume(): ?int
    {
        return $this->volume;
    }

    public function setVolume(int $volume): self
    {
        $this->volume = $volume;

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
