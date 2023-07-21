<?php

namespace App\Entity;

use App\Repository\UserSettingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserSettingRepository::class)]
class UserSetting
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $leavingHomeTime = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $sleepingTime = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $arriveHomeTime = null;

    #[ORM\Column(nullable: true)]
    private ?int $comfortTemperature = null;

    #[ORM\Column(nullable: true)]
    private ?int $minEvCharge = null;

    #[ORM\Column(nullable: true)]
    private ?int $plantHumidity = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLeavingHomeTime(): ?\DateTimeInterface
    {
        return $this->leavingHomeTime;
    }

    public function setLeavingHomeTime(?\DateTimeInterface $leavingHomeTime): static
    {
        $this->leavingHomeTime = $leavingHomeTime;

        return $this;
    }

    public function getSleepingTime(): ?\DateTimeInterface
    {
        return $this->sleepingTime;
    }

    public function setSleepingTime(?\DateTimeInterface $sleepingTime): static
    {
        $this->sleepingTime = $sleepingTime;

        return $this;
    }

    public function getArriveHomeTime(): ?\DateTimeInterface
    {
        return $this->arriveHomeTime;
    }

    public function setArriveHomeTime(?\DateTimeInterface $arriveHomeTime): static
    {
        $this->arriveHomeTime = $arriveHomeTime;

        return $this;
    }

    public function getComfortTemperature(): ?int
    {
        return $this->comfortTemperature;
    }

    public function setComfortTemperature(?int $comfortTemperature): static
    {
        $this->comfortTemperature = $comfortTemperature;

        return $this;
    }

    public function getMinEvCharge(): ?int
    {
        return $this->minEvCharge;
    }

    public function setMinEvCharge(?int $minEvCharge): static
    {
        $this->minEvCharge = $minEvCharge;

        return $this;
    }

    public function getPlantHumidity(): ?int
    {
        return $this->plantHumidity;
    }

    public function setPlantHumidity(?int $plantHumidity): static
    {
        $this->plantHumidity = $plantHumidity;

        return $this;
    }
}
