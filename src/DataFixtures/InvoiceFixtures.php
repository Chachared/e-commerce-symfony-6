<?php

namespace App\DataFixtures;

use App\Entity\Invoice;
use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

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

        //fausses données grâce au faker
        $faker = Faker\Factory::create('fr_FR');

        for($i=5; $i<100; $i++){
            $invoice = new Invoice();

            $invoice->setPaymentMethod('CB');
            $invoice->setOrderDate($faker->dateTimeBetween('-2 years'));
            //Génère une reference type user8 pour pouvoir la récupérer sur les fixtures d'autres entités
            $invoice->setUser($this->getReference('user' . $faker->numberBetween(5, 50)));
            $manager->persist($invoice);
        }


        $manager->flush();
    }
    
        public function getDependencies(): array
        {
        return [
            UserFixtures::class,
        ];
    }

}