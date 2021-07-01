<?php

namespace App\DataFixtures;


use Faker\Factory;
use App\Entity\Artist;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create();

        $categories = ["Melodique", "Industrielle", "Groovy", "Deep", "Detroit"];

        for ($i = 0; $i <= 4; $i++) {
            // Categories
            $category = new Category();
            $category->setName($categories[$i]);
            $manager->persist($category);

            for ($j = 0; $j < 10; $j++) {
                $artist = new Artist();
                $artist->setName($faker->words(2, true))
                    ->setDescription($faker->sentences(10, true))
                    ->setConcert($faker->numberBetween(0, 1))
                    ->setCategory($category);


                $manager->persist($artist);
            }




            $manager->flush();
        }
    }
}
