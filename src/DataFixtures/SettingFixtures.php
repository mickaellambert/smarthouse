<?php

namespace App\DataFixtures;

use App\Entity\Type;
use App\Entity\Setting;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SettingFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach (Setting::SETTINGS as $settingFixture) {
            $setting = new Setting();
            $setting->setLabel($settingFixture);

            $this->addReference($settingFixture, $setting);
            
            $manager->persist($setting);
        }

        $manager->flush();
    }
}
