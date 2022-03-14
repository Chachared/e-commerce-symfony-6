<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category1= new Category();
        $category1->setName('Chien');
        $this->addReference('category1', $category1);
        $manager->persist($category1);
        
        $category7= new Category();
        $category7->setName('alimentation');
        $category7->setParentCategory($category1);
        $this->addReference('category7', $category7);
        $manager->persist($category7);
        
        $category8= new Category();
        $category8->setName('jeu');
        $category8->setParentCategory($category1);
        $this->addReference('category8', $category8);
        $manager->persist($category8);
        
        $category9= new Category();
        $category9->setName('couchage');
        $category9->setParentCategory($category1);
        $this->addReference('category9', $category9);
        $manager->persist($category9);
        
        $category10= new Category();
        $category10->setName('laisses et colliers');
        $category10->setParentCategory($category1);
        $this->addReference('category10', $category10);
        $manager->persist($category10);
        
        $category11= new Category();
        $category11->setName('accessoires');
        $category11->setParentCategory($category1);
        $this->addReference('category11', $category11);
        $manager->persist($category11);
        


        $category2= new Category();
        $category2->setName('Chat');
        $this->addReference('category2', $category2);
        $manager->persist($category2);
        
        $category12= new Category();
        $category12->setName('alimentation');
        $category12->setParentCategory($category2);
        $this->addReference('category12', $category12);
        $manager->persist($category12);
        
        $category13= new Category();
        $category13->setName('jeu');
        $category13->setParentCategory($category2);
        $this->addReference('category13', $category13);
        $manager->persist($category13);
        
        $category14= new Category();
        $category14->setName('couchage');
        $category14->setParentCategory($category2);
        $this->addReference('category14', $category14);
        $manager->persist($category14);
        
        $category15= new Category();
        $category15->setName('laisses et colliers');
        $category15->setParentCategory($category2);
        $this->addReference('category15', $category15);
        $manager->persist($category15);
        
        $category16= new Category();
        $category16->setName('accessoires');
        $category16->setParentCategory($category2);
        $this->addReference('category16', $category16);
        $manager->persist($category16);
 

        
        $category3= new Category();
        $category3->setName('Rongeurs');
        $this->addReference('category3', $category3);
        $manager->persist($category3);
        
        $category17= new Category();
        $category17->setName('alimentation');
        $category17->setParentCategory($category3);
        $this->addReference('category17', $category17);
        $manager->persist($category17);
        
        $category18= new Category();
        $category18->setName('jeu');
        $category18->setParentCategory($category3);
        $this->addReference('category18', $category18);
        $manager->persist($category18);
        
        $category19= new Category();
        $category19->setName('couchage');
        $category19->setParentCategory($category2);
        $this->addReference('category19', $category19);
        $manager->persist($category19);
        
        $category20= new Category();
        $category20->setName('accessoires');
        $category20->setParentCategory($category2);
        $this->addReference('category20', $category20);
        $manager->persist($category20);
        
        
        
        $category6= new Category();
        $category6->setName('Poissons');
        $this->addReference('category6', $category6);
        $manager->persist($category6);
        
        $category27= new Category();
        $category27->setName('alimentation');
        $category27->setParentCategory($category6);
        $this->addReference('category27', $category27);
        $manager->persist($category27);
        
        $category28= new Category();
        $category28->setName('entretien');
        $category28->setParentCategory($category6);
        $this->addReference('category28', $category28);
        $manager->persist($category28);
        
        $manager->flush();
    }
}