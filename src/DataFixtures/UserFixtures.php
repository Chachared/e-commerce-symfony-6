<?php

namespace App\DataFixtures;

use App\Entity\User;
use DateTime;
use DateTimeImmutable;
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
        $user1-> setBirthday(new DateTime('1982,10,02'));
        $user1-> setRegisterDate(new DateTime('2022,02,02'));
        $user1-> 
        $user1->
        $user1->addReference('user1', $user1); 
        $manager->persist($user1);

        $user2 = new User();
        $manager->persist($user2);

        $admin1 = new User();
        $manager->persist($admin1);

        $admin2 = new User();
        $manager->persist($admin2);

        $manager->flush();
    }
}