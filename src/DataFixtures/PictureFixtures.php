<?php

namespace App\DataFixtures;

use App\Entity\Picture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PictureFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $picture1 = new Picture();
        $picture1-> setHref('1-1.jpg');
        $picture1-> setAlt('Croquettes farmina pour chien');
        $picture1-> setProduct($this->getReference('product1'));
        $manager->persist($picture1);

        $picture2 = new Picture();
        $picture2-> setHref('2-1.jpg');
        $picture2-> setAlt('Balle pour chien');
        $picture2-> setProduct($this->getReference('product2'));
        $manager-> persist($picture2);

        $picture3 = new Picture();
        $picture3-> setHref('2-2.jpg');
        $picture3-> setAlt('Balle pour chien');
        $picture3-> setProduct($this->getReference('product2'));
        $manager-> persist($picture3);

        $picture4 = new Picture();
        $picture4-> setHref('2-3.jpg');
        $picture4-> setAlt('Balle pour chien');
        $picture4-> setProduct($this->getReference('product2'));
        $manager-> persist($picture4);

        $picture5 = new Picture();
        $picture5-> setHref('2-4.jpg');
        $picture5-> setAlt('Balle pour chien');
        $picture5-> setProduct($this->getReference('product2'));
        $manager-> persist($picture5);

        $picture6 = new Picture();
        $picture6-> setHref('3-1.jpg');
        $picture6-> setAlt('Lit pour chien');
        $picture6-> setProduct($this->getReference('product3'));
        $manager-> persist($picture6);
        
        $picture7 = new Picture();
        $picture7-> setHref('3-2.jpg');
        $picture7-> setAlt('Lit pour chien');
        $picture7-> setProduct($this->getReference('product3'));
        $manager-> persist($picture7);

        $picture8 = new Picture();
        $picture8-> setHref('3-3.jpg');
        $picture8-> setAlt('Lit pour chien');
        $picture8-> setProduct($this->getReference('product3'));
        $manager-> persist($picture8);

        $picture9 = new Picture();
        $picture9-> setHref('3-4.jpg');
        $picture9-> setAlt('Lit pour chien');
        $picture9-> setProduct($this->getReference('product3'));
        $manager-> persist($picture9);

        $picture10= new Picture();
        $picture10-> setHref('4-1.jpg');
        $picture10-> setAlt('harnais Julius K9');
        $picture10-> setProduct($this->getReference('product4'));
        $manager-> persist($picture10);


        $picture11= new Picture();
        $picture11-> setHref('5-1.jpg');
        $picture11-> setAlt('peigne furminator');
        $picture11-> setProduct($this->getReference('product5'));
        $manager-> persist($picture11);

        $picture12= new Picture();
        $picture12-> setHref('5-2.jpg');
        $picture12-> setAlt('peigne furminator');
        $picture12-> setProduct($this->getReference('product5'));
        $manager-> persist($picture12);

        $picture13= new Picture();
        $picture13-> setHref('5-3.jpg');
        $picture13-> setAlt('peigne furminator');
        $picture13-> setProduct($this->getReference('product5'));
        $manager-> persist($picture13);

        $picture14= new Picture();
        $picture14-> setHref('6-1.jpg');
        $picture14-> setAlt('croquettes pour chat farmina');
        $picture14-> setProduct($this->getReference('product6'));
        $manager-> persist($picture14);

        $picture15= new Picture();
        $picture15-> setHref('7-1.jpg');
        $picture15-> setAlt('jouet lapin pour chat');
        $picture15-> setProduct($this->getReference('product7'));
        $manager-> persist($picture15);

        $picture16= new Picture();
        $picture16-> setHref('8-1.jpg');
        $picture16-> setAlt('niche pour chat');
        $picture16-> setProduct($this->getReference('product8'));
        $manager-> persist($picture16);

        $picture17= new Picture();
        $picture17-> setHref('8-2.jpg');
        $picture17-> setAlt('niche pour chat');
        $picture17-> setProduct($this->getReference('product8'));
        $manager-> persist($picture17);

        $picture18= new Picture();
        $picture18-> setHref('9-1.jpg');
        $picture18-> setAlt('harnais pour chat');
        $picture18-> setProduct($this->getReference('product9'));
        $manager-> persist($picture18);

        $picture19= new Picture();
        $picture19-> setHref('9-2.jpg');
        $picture19-> setAlt('harnais pour chat');
        $picture19-> setProduct($this->getReference('product9'));
        $manager-> persist($picture19);

        $picture20= new Picture();
        $picture20-> setHref('9-1.jpg');
        $picture20-> setAlt('harnais pour chat');
        $picture20-> setProduct($this->getReference('product9'));
        $manager-> persist($picture20);

        $picture21= new Picture();
        $picture21-> setHref('10-1.jpg');
        $picture21-> setAlt('double gamelle pour chat');
        $picture21-> setProduct($this->getReference('product10'));
        $manager-> persist($picture21);
        
        $picture22= new Picture();
        $picture22-> setHref('10-2.jpg');
        $picture22-> setAlt('double gamelle pour chat');
        $picture22-> setProduct($this->getReference('product10'));
        $manager-> persist($picture22);

        $picture23= new Picture();
        $picture23-> setHref('11-1.jpg');
        $picture23-> setAlt('Aliment pour lapin Hamiform');
        $picture23-> setProduct($this->getReference('product11'));
        $manager-> persist($picture23);
        
        $picture24= new Picture();
        $picture24-> setHref('11-2.jpg');
        $picture24-> setAlt('Aliment pour lapin Hamiform');
        $picture24-> setProduct($this->getReference('product11'));
        $manager-> persist($picture24);

        $picture25= new Picture();
        $picture25-> setHref('12-1.jpg');
        $picture25-> setAlt('tunnel pour petit rongeur');
        $picture25-> setProduct($this->getReference('product12'));
        $manager-> persist($picture25);

        $picture25= new Picture();
        $picture25-> setHref('12-1.jpg');
        $picture25-> setAlt('tunnel pour petit rongeur');
        $picture25-> setProduct($this->getReference('product12'));
        $manager-> persist($picture25);

        $picture26= new Picture();
        $picture26-> setHref('13-1.jpg');
        $picture26-> setAlt('cachette pour petit rongeur');
        $picture26-> setProduct($this->getReference('product13'));
        $manager-> persist($picture26);

        $picture27= new Picture();
        $picture27-> setHref('14-1.jpg');
        $picture27-> setAlt('boîte de transport petit rongeur');
        $picture27-> setProduct($this->getReference('product14'));
        $manager-> persist($picture27);

        $picture28= new Picture();
        $picture28-> setHref('15-1.jpg');
        $picture28-> setAlt('nourriture pour poissons');
        $picture28-> setProduct($this->getReference('product15'));
        $manager-> persist($picture28);

        $picture29= new Picture();
        $picture29-> setHref('15-2.jpg');
        $picture29-> setAlt('nourriture pour poissons');
        $picture29-> setProduct($this->getReference('product15'));
        $manager-> persist($picture29);

        $picture30= new Picture();
        $picture30-> setHref('16-1.jpg');
        $picture30-> setAlt('conditionneur d\'eau pour aquarium');
        $picture30-> setProduct($this->getReference('product16'));
        $manager-> persist($picture30);

        $picture31= new Picture();
        $picture31-> setHref('16-2.jpg');
        $picture31-> setAlt('conditionneur d\'eau pour aquarium');
        $picture31-> setProduct($this->getReference('product16'));
        $manager-> persist($picture31);
        
        
        $manager->flush();
    }

        public function getDependencies()
    {
        return [
            ProductFixtures::class,
        ];
    }
}