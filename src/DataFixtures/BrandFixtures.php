<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BrandFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $brand1 = new Brand();
        $brand1->setName('Farmina');
        $this->addReference('brand1', $brand1);

        $brand2 = new Brand();
        $brand2->setName('Edgar Cooper');
        $this->addReference('brand2', $brand2);
        
        $brand3 = new Brand();
        $brand3->setName('Trixie');
        $this->addReference('brand3', $brand3);
        
        $brand4 = new Brand();
        $brand4->setName('Petmate');
        $this->addReference('brand4', $brand4);
        
        $brand5 = new Brand();
        $brand5->setName('Martin Sellier');
        $this->addReference('brand5', $brand5);
        
        $manager->persist($brand1);
        $manager->persist($brand2);
        $manager->persist($brand3);
        $manager->persist($brand4);
        $manager->persist($brand5);

        $manager->flush();
    }
}