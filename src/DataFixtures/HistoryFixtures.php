<?php

namespace App\DataFixtures;

use App\Entity\History;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class HistoryFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        foreach (DeviceFixtures::DEVICES as $deviceFixture) {
            $device = $this->getReference($deviceFixture['name']);
            
            for ($i = 0; $i < 6; $i++) {
                $history = new History();

                $history->setDevice($device);
                $history->setCreatedAt(new \DateTimeImmutable('now'));
                $history->setValue(rand(0, 10));

                $manager->persist($history);
            }
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            DeviceFixtures::class,
        ];
    }
}
