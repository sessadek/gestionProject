<?php

namespace App\DataFixtures;

use App\Entity\Priority;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class PriorityFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $Priorities = ['Bas', 'Normal', 'Haut', 'Urgent', 'Immédiat'];

        foreach($Priorities as $value) {
            $priority = new Priority();
            $priority->setName($value);
            $manager->persist($priority);
        }

        $manager->flush();
    }
}
