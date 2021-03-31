<?php

namespace App\DataFixtures;

use App\Entity\Base;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BaseFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Base Tomate
        $base = new Base();
        $base->setBaseName("Tomate")
            ->setBasePrice("5");
        $manager->persist($base);

        // Base Crème
        $base = new Base();
        $base->setBaseName("Crème")
            ->setBasePrice("7");
        $manager->persist($base);

        $manager->flush();
    }
}
