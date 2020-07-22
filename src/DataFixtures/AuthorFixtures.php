<?php

namespace App\DataFixtures;

use App\Entity\Author;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AuthorFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $author1 = new Author();
        $author1->setName("Roald Dahl");
        $author1->setDescription("Roald Dahl was a British novelist, short-story writer, poet, screenwriter, and wartime fighter pilot");
        $manager->persist($author1);

        $author2 = new Author();
        $author2->setName("J.K.Rowling");
        $author2->setDescription("Best for Harry porter series");
        $manager->persist($author2);

        $manager->flush();
    }
}
