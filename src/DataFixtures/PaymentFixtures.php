<?php

namespace App\DataFixtures;

use App\Entity\Payment;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class PaymentFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $payments = ['Payé', 'En attente du paiement par chèque', 'Remboursé', 'Non payé'];

        foreach($payments as $value) {
            $payment = new Payment();
            $payment->setName($value);
            $manager->persist($payment);
        }

        $manager->flush();
    }
}
