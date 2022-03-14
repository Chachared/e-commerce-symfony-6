<?php

namespace App\DataFixtures;

use App\Entity\Invoice;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class InvoiceFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $invoice1 = new Invoice();
        $invoice1-> setPaymentMethod('CB');
        $invoice1-> setOrderDate(new DateTime('2022/03/12'));
        $invoice1-> setUser($this->getReference('user1'));
        $this-> addReference('invoice1', $invoice1); 
        $manager->persist($invoice1);

        $invoice2 = new Invoice();
        $invoice2-> setPaymentMethod('CB');
        $invoice2-> setOrderDate(new DateTime('2022/02/12'));
        $invoice2-> setUser($this->getReference('user1'));
        $this-> addReference('invoice2', $invoice2);
        $manager->persist($invoice2);

        $invoice3 = new Invoice();
        $invoice3-> setPaymentMethod('Paypal');
        $invoice3-> setOrderDate(new DateTime('2021/08/12'));
        $invoice3-> setUser($this->getReference('user2'));
        $this-> addReference('invoice3', $invoice3);
        $manager->persist($invoice3);
        
        $manager->flush();
    }
    
        public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }

}