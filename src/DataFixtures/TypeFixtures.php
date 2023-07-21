<?php

namespace App\DataFixtures;

use App\Entity\Type;
use App\Entity\Setting;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class TypeFixtures extends Fixture implements DependentFixtureInterface
{
    public const TYPES = [
        [
            'label' => 'Water Dispenser',
            'setting' => [Setting::SETTING_PLANT_HUMIDITY]
        ],
        [
            'label' => 'EV Charger',
            'setting' => [Setting::SETTING_MIN_EV_CHARGE]
        ],
        [
            'label' => 'Smart Thermostat',
            'setting' => [Setting::SETTING_COMFORT_TEMPERATURE]
        ],
        [
            'label' => 'Smart Lock',
            'setting' => Setting::SETTING_ARRIVE_HOME_TIME
        ],[
            'label' => 'Music Player',
            'setting' => [Setting::SETTING_SLEEPING_TIME]
        ]
    ];
    
    public function __construct(private SluggerInterface $slugger) {} 

    public function load(ObjectManager $manager): void
    {
        foreach (self::TYPES as $typeFixture) {
            $type = new Type();
            $type->setLabel($typeFixture['label']);
            
            foreach ($typeFixture['settings'] as $typeSettingFixture) {
                $type->addSetting($this->getReference($typeSettingFixture));
            }

            $this->addReference($typeFixture['label'], $type);

            $manager->persist($type);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SettingFixtures::class,
        ];
    }
}
