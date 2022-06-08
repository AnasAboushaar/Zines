<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Magazine;
use DateTimeImmutable;
use Faker;

class MagazineFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Initialisation de Faker
        $faker = Faker\Factory::create();

        for($i = 0; $i < 10; $i++) {

            // Date aléatoire
            $date = new DateTimeImmutable();
            $randDate = $date->modify('-'. rand(1, 600) .' days');
            // $randDate = $date->modify('-12 days');

            $magazine = new Magazine();
            $magazine->setName($faker->name);
            $magazine->setPrice($faker->numberBetween(6, 30));
            $magazine->setCreatedAt(DateTimeImmutable::createFromMutable($faker->dateTimeBetween('-10 years')));

            $manager->persist($magazine);
        }

        $manager->flush();
    }
}
