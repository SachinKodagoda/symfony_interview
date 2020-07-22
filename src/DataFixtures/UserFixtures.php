<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('sachin90');
        $user->setEmail("duminda.g.k@gmail.com");
        $user->setRoles(['customer']);
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            '1234'
        ));
        $manager->persist($user);
        $manager->flush();
    }
}
