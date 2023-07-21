<?php

namespace App\DataFixtures;

use App\Entity\UserSetting;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserSettingFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $userSettings = new UserSetting();

        $userSettings->setLeavingHomeTime(\DateTime::createFromFormat('H:i', '08:10'))
                    ->setSleepingTime(\DateTime::createFromFormat('H:i', '21:10'))
                    ->setArriveHomeTime(\DateTime::createFromFormat('H:i', '18:30'))
                    ->setComfortTemperature(rand(16, 30))
                    ->setMinEvCharge(30)
                    ->setPlantHumidity(60);
        
        $manager->persist($userSettings);
        $manager->flush();
    }

}
