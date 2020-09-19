<?php

namespace App\DataFixtures;

use App\Entity\ClientLocation;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ClientLocationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $clients = ['offshore', 'marocain'];

        foreach($clients as $value) {
            $client = new ClientLocation();
            $client->setName($value);
            $manager->persist($client);
        }

        $manager->flush();
    }
}
