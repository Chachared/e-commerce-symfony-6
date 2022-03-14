<?php

namespace App\DataFixtures;

use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserFixtures extends Fixture
{

    private UserPasswordHasherInterface $hasher;
    
    public function __construct(UserPasswordHasherInterface $hasher){
        $this->hasher= $hasher;
    }
    
    public function load(ObjectManager $manager): void
    {
        $user1 = new User();
        $user1-> setUsername('chachared');
        $user1-> setRoles(['ROLE_USER']);
        $user1-> setPassword($this->hasher->hashPassword($user1,'splinter'));
        $user1-> setTitle('Mme');
        $user1-> setFirstname('Chach');
        $user1-> setLastname('Ared');
        $user1-> setEmail('ccr@user.org');
        $user1-> setBirthday(new DateTime('1982/10/02'));
        $user1-> setRegisterDate(new DateTime('2022/02/02'));
        $this-> addReference('user1', $user1); 
        $manager->persist($user1);

        $user2 = new User();
        $user2-> setUsername('crystalka');
        $user2-> setRoles(['ROLE_USER']);
        $user2-> setPassword($this->hasher->hashPassword($user2,'splinter'));
        $user2-> setTitle('M.');
        $user2-> setFirstname('Crys');
        $user2-> setLastname('Talka');
        $user2-> setEmail('ck@user.org');
        $user2-> setBirthday(new DateTime('1995/10/02'));
        $user2-> setRegisterDate(new DateTime('2022/02/12'));
        $this-> addReference('user2', $user2); 
        $manager->persist($user2);

        $admin1 = new User();
        $admin1-> setUsername('LaTerreEstPlate');
        $admin1-> setRoles(['ROLE_ADMIN']);
        $admin1-> setPassword($this->hasher->hashPassword($user2,'Issou2021'));
        $admin1-> setTitle('Mme');
        $admin1-> setFirstname('Nadège');
        $admin1-> setLastname('-');
        $admin1-> setEmail('nadege@la-nimes-alerie.fr');
        $admin1-> setBirthday(new DateTime('1995/04/08'));
        $admin1-> setRegisterDate(new DateTime('2022/01/01'));
        $this-> addReference('admin1', $admin1); 
        $manager->persist($admin1);

        $admin2 = new User();
        $admin2-> setUsername('LaFaceCachéeDeLaLune');
        $admin2-> setRoles(['ROLE_ADMIN']);
        $admin2-> setPassword($this->hasher->hashPassword($user2,'Issou2021'));
        $admin2-> setTitle('M.');
        $admin2-> setFirstname('-');
        $admin2-> setLastname('Capard');
        $admin2-> setEmail('capard@la-nimes-alerie.fr');
        $admin2-> setBirthday(new DateTime('1975/08/20'));
        $admin2-> setRegisterDate(new DateTime('2022/01/01'));
        $this-> addReference('admin2', $admin2); 
        $manager->persist($admin2);

        $manager->flush();
    }
}