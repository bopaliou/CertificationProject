<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $encoder;
    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder=$encoder;
    }
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker=Faker\Factory::create("fr_FR");
        for ($nbUsers=0; $nbUsers <30 ; $nbUsers++) { 
            $user=new User();
            $user->setEmail($faker->email);
            if($nbUsers===1)
                $user->setRoles(['ROLE_ADMIN']);
            
            else 
                $user->setRoles(['ROLE_USER']);
            
            $user->setPassword($this->encoder->hashPassword($user,'passer'));
            $user->setNom($faker->firstName);
            $user->setPrenom($faker->lastName);
            $user->setAdresse($faker->address);
            $user->setDateNaissance($faker->dateTime($max = 'now', $timezone = null));
            $user->setLieuNaissance($faker->city);
            $user->setTelephone($faker->phoneNumber);
            $manager->persist($user);
        }
        $manager->flush();
    }
}
