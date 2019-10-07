<?php

namespace App\DataFixtures;

use App\Entity\Property;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class PropertyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for($i = 0; $i < 50; $i++)
        {
         $property = new Property();
         $property
             ->setTitle($faker->word(3, true))
             ->setDescription($faker->sentence(6, false))
             ->setSurface($faker->numberBetween(20, 200))
             ->setRomms($faker->randomDigit())
             ->setBedrooms($faker->randomDigit())
             ->setFloor($faker->randomDigit())
             ->setPrice($faker->randomNumber(8))
             ->setHeat($faker->numberBetween(0, 1))
             ->setCity($faker->city())
             ->setAddress($faker->streetAddress())
             ->setPostalCode($faker->postcode())
             ->setSold(false);
         $manager->persist($property);

        }
        $manager->flush();
    }
}
