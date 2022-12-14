<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 6; $i++) {
            for ($j = 0; $j < 5; $j++) {
                for ($k = 0; $k < 10; $k++) {
                    $episode = new Episode;
                    $episode->setTitle($faker->words(10, true));
                    $episode->setNumber($faker->numberBetween(1, 10));
                    $episode->setSynopsis($faker->paragraph(3, true));
                    $episode->setSeason($this->getReference('season_' . $i . $j));

                    $manager->persist($episode);
                }
            }
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            SeasonFixtures::class
        ];
    }
}
