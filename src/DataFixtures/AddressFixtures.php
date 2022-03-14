<?php

namespace App\DataFixtures;

use App\Entity\Address;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AddressFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $address1 = new Address();
        $address1-> setStreetNumber(5);
        $address1-> setStreet('rue des fixtures');
        $address1-> setZipcode('01000');
        $address1-> setCity('localcity');
        $address1-> setCountry('France');
        $address1-> setIsBilling(true);
        $address1-> setIsDelivery(true);
        $address1-> setUser($this->getReference('user1'));
        $this->addReference('address1', $address1); 
        $manager->persist($address1);

        $address2 = new Address();
        $address2-> setStreetNumber(38);
        $address2-> setStreet('allée des essais');
        $address2-> setZipcode('02000');
        $address2-> setCity('Ici');
        $address2-> setCountry('France');
        $address2-> setIsBilling(false);
        $address2-> setIsDelivery(true);
        $address2-> setUser($this->getReference('user1'));
        $this->addReference('address2', $address2); 
        $manager->persist($address2);

        $address3 = new Address();
        $address3-> setStreetNumber(245);
        $address3-> setStreet('Avenue des tests');
        $address3-> setZipcode('03000');
        $address3-> setCity('La-bas');
        $address3-> setCountry('France');
        $address3-> setIsBilling(true);
        $address3-> setIsDelivery(true);
        $address3-> setUser($this->getReference('user2'));
        $this->addReference('address3', $address3); 
        $manager->persist($address3);

        $address4 = new Address();
        $address4-> setStreetNumber(245);
        $address4-> setStreet('Avenue des tests');
        $address4-> setZipcode('03000');
        $address4-> setCity('La-bas');
        $address4-> setCountry('France');
        $address4-> setIsBilling(false);
        $address4-> setIsDelivery(true);
        $address4-> setUser($this->getReference('user2'));
        $this->addReference('address4', $address4); 
        $manager->persist($address4);

        $address6 = new Address();
        $address6-> setStreetNumber(240);
        $address6-> setStreet('Allée des animaux rassasiés');
        $address6-> setZipcode('30900');
        $address6-> setCity('Nîmes');
        $address6-> setCountry('France');
        $address6-> setIsBilling(true);
        $address6-> setIsDelivery(true);
        $address6-> setUser($this->getReference('admin1'));
        $this->addReference('address6', $address6); 
        $manager->persist($address6);

        $address5 = new Address();
        $address5-> setStreetNumber(240);
        $address5-> setStreet('Allée des animaux rassasiés');
        $address5-> setZipcode('30900');
        $address5-> setCity('Nîmes');
        $address5-> setCountry('France');
        $address5-> setIsBilling(true);
        $address5-> setIsDelivery(true);
        $address5-> setUser($this->getReference('admin2'));
        $this->addReference('address5', $address5); 
        $manager->persist($address5);        

        $manager->flush();
    }

        public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}