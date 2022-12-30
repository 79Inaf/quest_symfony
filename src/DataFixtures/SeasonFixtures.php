<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 6; $i++) {

            for ($j = 0; $j < 5; $j++) {
                $season = new Season();
                $season->setNumber($faker->numberBetween(1, 5));
                $season->setYear($faker->year());
                $season->setDescription($faker->paragraphs(2, true));

                $season->setProgram($this->getReference('program_' . $i));

                $this->addReference('season_' . $i . $j, $season);

                $manager->persist($season);
            }
        }

        // for ($i = 0; $i < 5; $i++) {
        //     $season = new Season();
        //     $season->setNumber($faker->numberBetween(1, 5));
        //     $season->setYear($faker->year());
        //     $season->setDescription($faker->paragraphs(2, true));

        //     $season->setProgram($this->getReference('program_1'));

        //     $manager->persist($season);
        // }

        // for ($i = 0; $i < 5; $i++) {
        //     $season = new Season();
        //     $season->setNumber($faker->numberBetween(1, 5));
        //     $season->setYear($faker->year());
        //     $season->setDescription($faker->paragraphs(2, true));

        //     $season->setProgram($this->getReference('program_2'));

        //     $manager->persist($season);
        // }

        // for ($i = 0; $i < 5; $i++) {
        //     $season = new Season();
        //     $season->setNumber($faker->numberBetween(1, 5));
        //     $season->setYear($faker->year());
        //     $season->setDescription($faker->paragraphs(2, true));

        //     $season->setProgram($this->getReference('program_3'));

        //     $manager->persist($season);
        // }

        // for ($i = 0; $i < 5; $i++) {
        //     $season = new Season();
        //     $season->setNumber($faker->numberBetween(1, 5));
        //     $season->setYear($faker->year());
        //     $season->setDescription($faker->paragraphs(2, true));

        //     $season->setProgram($this->getReference('program_4'));

        //     $manager->persist($season);
        // }

        // for ($i = 0; $i < 5; $i++) {
        //     $season = new Season();
        //     $season->setNumber($faker->numberBetween(1, 5));
        //     $season->setYear($faker->year());
        //     $season->setDescription($faker->paragraphs(2, true));

        //     $season->setProgram($this->getReference('program_5'));

        //     $manager->persist($season);
        // }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ProgramFixtures::class,
        ];
    }
}
