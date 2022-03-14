<?php

namespace App\DataFixtures;

use App\Entity\Address;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AddressFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $address1 = new Address();
        $address1->
        $address1->
        $address1->
        $address1->
        $address1->
        $address1->
        $manager->persist($address1);


        
        $manager->flush();
    }
}