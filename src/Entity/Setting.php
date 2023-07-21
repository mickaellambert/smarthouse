<?php

namespace App\Entity;

use App\Repository\SettingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SettingRepository::class)]
class Setting
{
    public const SETTINGS = [
        self::SETTING_LEAVING_HOME_TIME,
        self::SETTING_SLEEPING_TIME,
        self::SETTING_ARRIVE_HOME_TIME,
        self::SETTING_COMFORT_TEMPERATURE,
        self::SETTING_MIN_EV_CHARGE,
        self::SETTING_PLANT_HUMIDITY
    ];

    public const SETTING_LEAVING_HOME_TIME = 'leavingHomeTime';
    public const SETTING_SLEEPING_TIME = 'sleepingTime';
    public const SETTING_ARRIVE_HOME_TIME = 'arriveHomeTime';
    public const SETTING_COMFORT_TEMPERATURE = 'comfortTemperature';
    public const SETTING_MIN_EV_CHARGE = 'minEvCharge';
    public const SETTING_PLANT_HUMIDITY = 'plantHumidity';
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    #[ORM\ManyToMany(targetEntity: Type::class, inversedBy: 'settings')]
    private Collection $types;

    public function __construct()
    {
        $this->types = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return Collection<int, Type>
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function addType(Type $type): static
    {
        if (!$this->types->contains($type)) {
            $this->types->add($type);
        }

        return $this;
    }

    public function removeType(Type $type): static
    {
        $this->types->removeElement($type);

        return $this;
    }
}
