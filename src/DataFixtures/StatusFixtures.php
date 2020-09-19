<?php

namespace App\DataFixtures;

use App\Entity\Status;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class StatusFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $listStatus = ['Nouveau', 'En cours', 'En cours de test', 'Résolu', 'Fermé'];

        foreach($listStatus as $value) {
            $status = new Status();
            $status->setName($value);
            $manager->persist($status);
        }

        

        $manager->flush();
    }
}
