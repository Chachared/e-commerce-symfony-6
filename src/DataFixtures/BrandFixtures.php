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
        $brand1->setName('Carnilove');
        $this->addReference('brand1', $brand1);
        $manager->persist($brand1);

        $brand2 = new Brand();
        $brand2->setName('Farmina');
        $this->addReference('brand2', $brand2);
        $manager->persist($brand2);
        
        $brand3 = new Brand();
        $brand3->setName('Trixie');
        $this->addReference('brand3', $brand3);
        $manager->persist($brand3);
        
        $brand4 = new Brand();
        $brand4->setName('Wouapy');
        $this->addReference('brand4', $brand4);
        $manager->persist($brand4);
        
        $brand5 = new Brand();
        $brand5->setName('bobby');
        $this->addReference('brand5', $brand5);
        $manager->persist($brand5);

        $brand6 = new Brand();
        $brand6->setName('Tetra');
        $this->addReference('brand6', $brand6);
        $manager->persist($brand6);

        $brand8 = new Brand();
        $brand8->setName('Hamiform');
        $this->addReference('brand8', $brand8);
        $manager->persist($brand8);

        $brand9 = new Brand();
        $brand9->setName('Exo Terra');
        $this->addReference('brand9', $brand9);
        $manager->persist($brand9);

        $brand10 = new Brand();
        $brand10->setName('Julius K9');
        $this->addReference('brand10', $brand10);
        $manager->persist($brand10);

        $brand11 = new Brand();
        $brand11->setName('Furminator');
        $this->addReference('brand11', $brand11);
        $manager->persist($brand11);

        $brand12 = new Brand();
        $brand12->setName('Meyou');
        $this->addReference('brand12', $brand12);
        $manager->persist($brand12);

        $brand13 = new Brand();
        $brand13->setName('Cat It');
        $this->addReference('brand13', $brand13);
        $manager->persist($brand13);

        $brand14 = new Brand();
        $brand14->setName('Beeztees');
        $this->addReference('brand14', $brand14);
        $manager->persist($brand14);

        $brand15 = new Brand();
        $brand15->setName('Ebi');
        $this->addReference('brand15', $brand15);
        $manager->persist($brand15);
        
        $manager->flush();
    }
}