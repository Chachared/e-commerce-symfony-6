<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $product1 = new Product();
        $product1-> setTitle('Farmina N&D sans céréales Adult Medium/Maxi poulet, grenade pour chien');
        $product1-> setDescription('Les croquettes sans céréales Farmina N&D sans céréales Adult Medium/Maxi, poulet et grenade ont été spécialement élaborées pour répondre aux exigences nutritionnelles des chiens sensibles de races moyennes et grandes. Leur processus de fabrication garantit la préservation des nutriments essentiels des matières premières naturelles et une bonne digestibilité.');
        $product1-> setHTPrice(63,19);
        $product1-> setIsActive(true);
        $product1-> setStock(4);
        $product1-> setIsFlash(true);
        $product1-> setStars(5);
        $product1-> setBrand($this->getReference('brand2'));
        $product1-> setCategory($this->getReference('category7'));
        $this->addReference('product1', $product1);
        $manager->persist($product1);

        $product2 = new Product();
        $product2-> setTitle('Balle Classic');
        $product2-> setDescription('Les balles de sport en latex Trixie pour chien sont très amusantes avec leur design décalé. Votre chien passera de longues heures à faire rouler, attraper, mâcher la balle...un jeu simple mais tellement sympathique! La balle de sport couine sous la pression pour stimuler davantage les sens de votre compagnon.  
        Matière : latex  
        Coloris : jaune, orange, vert ou blanc selon disponibilité
        Dimensions : diamètre 7 cm
        Jouet pour chien à utiliser sous surveillance du maître. L\'état du jouet est à contrôler régulièrement afin d\'éviter tout risque d\'ingestion de petits morceaux par votre animal. Ne pas laisser à la portée des enfants.');
        $product2-> setHTPrice(4,39);
        $product2-> setIsActive(true);
        $product2-> setStock(52);
        $product2-> setIsFlash(true);
        $product2-> setStars(3);
        $product2-> setBrand($this->getReference('brand3'));
        $product2-> setCategory($this->getReference('category8'));
        $this->addReference('product2', $product2);
        $manager->persist($product2);

        $product3 = new Product();
        $product3-> setTitle('Corbeille Cocoon pour chien');
        $product3-> setDescription('Offrez un confort sans pareil à votre boule de poils adorée pour de longues siestes paisibles.
        Extrêmement douces et douillette, la corbeille Cocoon donne l\'impression à votre votre chat ou chien de dormir sur un nuage !
        Son rembourrage en ouate généreux l\'accueille pour faire des beaux rêves.
        Votre compagnon ne pourra pas résister très longtemps à se blottir à l\'intérieur, entouré par ses rebords enveloppants.
        Dans la même collection, découvrez le lit douillet Cocoon pour chat et petit chien et le matelas Cocoon pour chien.
        Matière : 100% polyester');
        $product3-> setHTPrice(27,51);
        $product3-> setIsActive(true);
        $product3-> setStock(15);
        $product3-> setIsFlash(true);
        $product3-> setStars(4);
        $product3-> setBrand($this->getReference('brand4'));
        $product3-> setCategory($this->getReference('category9'));
        $this->addReference('product3', $product3);
        $manager->persist($product3);

        $product4 = new Product();
        $product4-> setTitle('Harnais IDC Power Fluo');
        $product4-> setDescription('Le harnais IDC Power offrir un confort sans pareil à votre chien grâce à sa technicité au plus près de la morphologie de votre chien.
        Très robuste, ce harnais dispose de bandes réfléchissantes  pour une visibilité maximale de votre compagnon.');
        $product4-> setHTPrice(40,71);
        $product4-> setIsActive(true);
        $product4-> setStock(12);
        $product4-> setIsFlash(true);
        $product4-> setStars(4);
        $product4-> setBrand($this->getReference('brand10'));
        $product4-> setCategory($this->getReference('category10'));
        $this->addReference('product4', $product4);
        $manager->persist($product4);

        $product5 = new Product();
        $product5-> setTitle('Brosse Furminator poils courts');
        $product5-> setDescription('Vous êtes fatigué de retrouver des poils de votre chien partout dans la maison ? La brosse Furminator est LA solution !
        Spécialement conçue pour les chiens à poils courts (les poils mesurant moins de 5 cm), la brosse est dotée d\'une lame en acier inoxydable, de qualité premium, qui pénètre dans le pelage de votre chien pour éliminer le duvet et démêler ses poils, sans le blesser. 
        La perte de poils est ainsi réduite jusqu\'à 90%.');
        $product5-> setHTPrice(21,59);
        $product5-> setIsActive(true);
        $product5-> setStock(27);
        $product5-> setIsFlash(true);
        $product5-> setStars(5);
        $product5-> setBrand($this->getReference('brand11'));
        $product5-> setCategory($this->getReference('category11'));
        $this->addReference('product5', $product5);
        $manager->persist($product5);

        $product6 = new Product();
        $product6-> setTitle('N&D Grain Free Neutered poulet, grenade pour chat');
        $product6-> setDescription('Les croquettes sans céréales Farmina N&D Grain Free Neutered poulet & grenade s\'inspirent de l\'alimentation naturelle des chats et ont été spécialement élaborées pour répondre aux exigences nutritionnelles des chats après une castration/stérilisation. Formulées en collaboration avec la Chair de Nutrition Animale de l\'Université de Naples, elles ne contiennent que des ingrédients naturels de grande qualité, dont 70 % proviennent d\'ingrédients d\'origine animale qui sont riches en protéines. Complété par 30 % de fruits, de légumes et d\'ingrédients d\'origine végétale, cet aliment équilibré et riche en substances vitales offre à votre chat un repas de qualité premium. Les croquettes Farmina N&D Grain Free Neutered poulet & grenade ne contiennent pas de céréales ni de gluten et sont garanties sans conservateurs. Elles conviennent donc aussi aux animaux sensibles qui souffrent d\'allergies ou d\'intolérances alimentaires.');
        $product6-> setHTPrice(18,39);
        $product6-> setIsActive(true);
        $product6-> setStock(11);
        $product6-> setIsFlash(true);
        $product6-> setStars(5);
        $product6-> setBrand($this->getReference('brand2'));
        $product6-> setCategory($this->getReference('category12'));
        $this->addReference('product6', $product6);
        $manager->persist($product6);

        $product7 = new Product();
        $product7-> setTitle('Jouet pour chat');
        $product7-> setDescription('Ce jouet en jute, en forme de lapin ou de chouette au choix, saura ravir votre chat et l\'occuper durant vos absences. Il permet de stimuler son instinct naturel de chasseur en l\'incitant à jouer et à bondir dessus.
        Avec sa composition en jute, votre chat pourra facilement planter ses griffes pour attraper sa proie.
        Ces petits jouets tout mignons et amusants raviront vos chats !
        Coloris : beige et vert 
        Dimensions Lapin : L 9,5 x l 7 cm
        Dimensions Chouette : L 8 x l 6,5 cm');
        $product7-> setHTPrice(1.67);
        $product7-> setIsActive(true);
        $product7-> setStock(92);
        $product7-> setIsFlash(true);
        $product7-> setStars(3);
        $product7-> setBrand($this->getReference('brand3'));
        $product7-> setCategory($this->getReference('category13'));
        $this->addReference('product7', $product7);
        $manager->persist($product7);

        $product8 = new Product();
        $product8-> setTitle('Cube Cocon - Edition Bois');
        $product8-> setDescription('2 en 1, le cube cocon édition bois, est un couchage pour chat à la fois confortable, élégant et pratique grâce à sa fonction griffoir !
        Véritable objet déco, au design épuré et aux couleurs sobres, il s\'intégrera parfaitement à votre intérieur.');
        $product8-> setHTPrice(128);
        $product8-> setIsActive(true);
        $product8-> setStock(2);
        $product8-> setIsFlash(true);
        $product8-> setStars(5);
        $product8-> setBrand($this->getReference('brand12'));
        $product8-> setCategory($this->getReference('category14'));
        $this->addReference('product8', $product8);
        $manager->persist($product8);

        $product9 = new Product();
        $product9-> setTitle('Parure laisse et harnais Safe');
        $product9-> setDescription('Emmenez en balade votre chat en toute sécurité avec la parure réfléchissante laisse et harnais Safe !   
        Composé d\'une laisse et d\'un harnais
        Harnais orné d\'un grelot
        Réglable au niveau du cou et du poitrail pour s\'adapter à la morphologie du chat
        Réfléchissant, il permettra à votre animal d\'être vu facilement
        Nylon tressé pour plus de résistance
        Coloris : Turquoise
        Matière : 100% Nylon
        Dimensions : 
        Tour de cou : 18-28 cm
        Tour de poitrail : 25-38 cm
        Largeur  : 1 cm
        Longueur laisse : 100 cm
        Entretien : lavable en machine à 30°. Retirer le grelot pour le lavage.');
        $product9-> setHTPrice(10.39);
        $product9-> setIsActive(true);
        $product9-> setStock(27);
        $product9-> setIsFlash(true);
        $product9-> setStars(2);
        $product9-> setBrand($this->getReference('brand5'));
        $product9-> setCategory($this->getReference('category15'));
        $this->addReference('product9', $product9);
        $manager->persist($product9);

        $product10 = new Product();
        $product10-> setTitle('Gamelle double Glass Diner');
        $product10-> setDescription('D\'un design contemporain, la gamelle double Glass Diner pour chat et petit chien est composée de 2 bols en verre s\'imbriquant dans un socle élégant en PVC aspect laqué.');
        $product10-> setHTPrice(17.19);
        $product10-> setIsActive(true);
        $product10-> setStock(54);
        $product10-> setIsFlash(true);
        $product10-> setStars(4);
        $product10-> setBrand($this->getReference('brand13'));
        $product10-> setCategory($this->getReference('category16'));
        $this->addReference('product10', $product10);
        $manager->persist($product10);

        $product11 = new Product();
        $product11-> setTitle('Optima BIO jeune lapin');
        $product11-> setDescription('Hamiform a spécialement étudié les besoins alimentaires du jeune lapin et est allé chercher des ingrédients biologiques afin de lui apporter un repas sain, complet et équilibré.
        La taille et la forme des granulés Optima BIO jeune lapin ont été spécialement étudiées afin d’en faciliter la prise. Le lapin toy ou le jeune lapin ont en effet une mâchoire plus petite et nécessite un granulé adapté.
        Le Yucca, présent dans le granulé, optimise le taux de pH intestinal et favorise ainsi les défenses immunitaires, rendant le lapereau moins sensible aux agressions extérieures.');
        $product11-> setHTPrice(5.99);
        $product11-> setIsActive(true);
        $product11-> setStock(7);
        $product11-> setIsFlash(true);
        $product11-> setStars(5);
        $product11-> setBrand($this->getReference('brand8'));
        $product11-> setCategory($this->getReference('category17'));
        $this->addReference('product11', $product11);
        $manager->persist($product11);

        $product12 = new Product();
        $product12-> setTitle('Tunnel à bascule');
        $product12-> setDescription('Offrez de l\'amusement à votre rongeur avec le tunnel à bascule Clovis !
        Le tunnel repose sur une bascule et se balance d\'avant en arrière. Il a également plusieurs trous, pour lui permettre d\'entrer et de sortir par plusieurs endroits.
        En ajoutant ce tunnel, vous rendrez la cage de votre rongeur plus amusantes !
        Matière : bois');
        $product12-> setHTPrice(8.71);
        $product12-> setIsActive(true);
        $product12-> setStock(11);
        $product12-> setIsFlash(true);
        $product12-> setStars(4);
        $product12-> setBrand($this->getReference('brand14'));
        $product12-> setCategory($this->getReference('category18'));
        $this->addReference('product12', $product12);
        $manager->persist($product12);

        $product13 = new Product();
        $product13-> setTitle('Cachette en herbe');
        $product13-> setDescription('Cette cachette en herbe pour hamster, souris ou gerbille sera idéale pour votre petit compagnon.
        Un petit nid douillet pour votre petit animal.
        Matière : herbe séchée
        Dimensions : Long 10.5 x larg 10.5 x Haut 10.5 cm');
        $product13-> setHTPrice(2.55);
        $product13-> setIsActive(true);
        $product13-> setStock(33);
        $product13-> setIsFlash(true);
        $product13-> setStars(3);
        $product13-> setBrand($this->getReference('brand3'));
        $product13-> setCategory($this->getReference('category19'));
        $this->addReference('product13', $product13);
        $manager->persist($product13);

        $product14 = new Product();
        $product14-> setTitle('Panier transport PAW');
        $product14-> setDescription('Panier de transport pour rongeur à prix incroyable ! En plastique avec motif pattes et ouverture par le haut. Avec ses poignées ergonomiques et la fermeture sûre et pratique, le transport de votre rongeur devient facile.');
        $product14-> setHTPrice(8.63);
        $product14-> setIsActive(true);
        $product14-> setStock(15);
        $product14-> setIsFlash(true);
        $product14-> setStars(4);
        $product14-> setBrand($this->getReference('brand15'));
        $product14-> setCategory($this->getReference('category20'));
        $this->addReference('product14', $product14);
        $manager->persist($product14);

        $product15 = new Product();
        $product15-> setTitle('Aliment complet en granulés pour poissons');
        $product15-> setDescription('L\'aliment en granulés TetraMin Granules fournira à vos poissons tous les nutriments dont ils ont besoin pour une longue vie en pleine santé. Sa formule équilibrée à base de vitamines, d\'oligo-éléments et de minéraux a une consistance et un goût très appréciés des poissons, est facile à digérer et améliore la qualité de l\'eau.');
        $product15-> setHTPrice(5.99);
        $product15-> setIsActive(true);
        $product15-> setStock(65);
        $product15-> setIsFlash(true);
        $product15-> setStars(4);
        $product15-> setBrand($this->getReference('brand6'));
        $product15-> setCategory($this->getReference('category27'));
        $this->addReference('product15', $product15);
        $manager->persist($product15);
        
        $product16 = new Product();
        $product16-> setTitle('EasyBalance');
        $product16-> setDescription('L\'utilisation régulière du conditionneur d\'eau Tetra EasyBalance permet d\'améliorer durablement la qualité de l\'eau de l\'aquarium. Sa formule efficace stabilise les valeurs importantes de l\'eau, à savoir la dureté carbonée (KH) et le pH, réduit les teneurs en phosphates et en nitrates et fournit des vitamines et minéraux indispensables aux plantes et aux poissons.');
        $product16-> setHTPrice(8.79);
        $product16-> setIsActive(true);
        $product16-> setStock(18);
        $product16-> setIsFlash(true);
        $product16-> setStars(4);
        $product16-> setBrand($this->getReference('brand6'));
        $product16-> setCategory($this->getReference('category28'));
        $this->addReference('product16', $product16);
        $manager->persist($product16);
        
    
        $manager->flush();
    }

        public function getDependencies()
    {
        return [
            BrandFixtures::class,
            CategoryFixtures::class,
        ];
    }
}