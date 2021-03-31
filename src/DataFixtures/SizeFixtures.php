<?php

namespace App\DataFixtures;

use App\Entity\Base;
use App\Entity\Size;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SizeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Taille Petite
        $size = new Size();
        $size->setSizeName("Petite")
            ->setSizePrice("0");
        $manager->persist($size);

        // Taille Moyenne
        $size = new Size();
        $size->setSizeName("Moyenne")
            ->setSizePrice("3");
        $manager->persist($size);

        // Taille Grande
        $size = new Size();
        $size->setSizeName("Grande")
            ->setSizePrice("6");
        $manager->persist($size);

        $manager->flush();
    }
}
