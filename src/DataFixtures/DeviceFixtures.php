<?php

namespace App\DataFixtures;

use App\Entity\Device;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class DeviceFixtures extends Fixture implements DependentFixtureInterface
{
    public const DEVICES = [
        [
            'name' => 'Heater (Lucas bedroom)',
            'status' => Device::STATUS_ON,
            'type' => 'Smart Thermostat'
        ],
        [
            'name' => 'Auto watering terrasse',
            'status' => Device::STATUS_ON,
            'type' => 'Water Dispenser'
        ],
        [
            'name' => 'Heater (Sophie bedroom)',
            'status' => Device::STATUS_ON,
            'type' => 'Smart Thermostat'
        ],
        [
            'name' => 'EV Charger Device',
            'status' => Device::STATUS_ON,
            'type' => 'EV Charger'
        ],
        [
            'name' => 'Radio',
            'status' => Device::STATUS_OFF,
            'type' => 'Music Player'
        ]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::DEVICES as $deviceFixture) {
            $device = new Device();
            $device->setName($deviceFixture['name']);
            $device->setStatus($deviceFixture['status']);
            $device->setType($this->getReference($deviceFixture['type']));

            $this->addReference($deviceFixture['name'], $device);

            $manager->persist($device);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            TypeFixtures::class,
        ];
    }
}
