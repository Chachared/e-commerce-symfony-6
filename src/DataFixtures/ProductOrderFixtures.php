<?php

namespace App\DataFixtures;

use App\Entity\ProductOrder;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProductOrderFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $productOrder1 = new ProductOrder();
        $productOrder1-> setProduct($this->getReference('product1'));
        $productOrder1-> setInvoice($this->getReference('invoice1'));
        $productOrder1-> setQuantity(3);
        $productOrder1-> setHTPrice(62,34);
        $manager->persist($productOrder1);

        $productOrder2 = new ProductOrder();
        $productOrder2-> setProduct($this->getReference('product2'));
        $productOrder2-> setInvoice($this->getReference('invoice1'));
        $productOrder2-> setQuantity(1);
        $productOrder2-> setHTPrice(18,32);
        $manager->persist($productOrder2);

        $productOrder3 = new ProductOrder();
        $productOrder3-> setProduct($this->getReference('product3'));
        $productOrder3-> setInvoice($this->getReference('invoice2'));
        $productOrder3-> setQuantity(2);
        $productOrder3-> setHTPrice(11,60);
        $manager->persist($productOrder3);

        $manager->flush();
    }

        public function getDependencies()
    {
        return [
            InvoiceFixtures::class,
            ProductFixtures::class,
        ];
    }
}