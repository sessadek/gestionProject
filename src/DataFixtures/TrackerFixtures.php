<?php

namespace App\DataFixtures;

use App\Entity\Tracker;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TrackerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $trackers = ['Anomalie', 'Changement', 'Evolution', 'Tâche', 'Assistance'];

        foreach($trackers as $value) {
            $tracker = new Tracker();
            $tracker->setName($value);
            $manager->persist($tracker);
        }

        $manager->flush();
    }
}
