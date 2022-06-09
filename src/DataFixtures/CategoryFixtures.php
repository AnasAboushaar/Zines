<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;
use Faker;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
       

        $faker = Faker\Factory::create();

        for($i = 0; $i < 15; $i++) {

            $category = new Category();
            $category->setName($faker->name);
            $category->setColor($faker->colorName);
            
            $this->addReference("category_$i", $category);
            $manager->persist($category);
        }

        $manager->flush();
    }
}
