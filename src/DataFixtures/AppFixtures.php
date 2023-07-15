<?php

namespace App\DataFixtures;

use App\Entity\TodoList;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
//        $todoList = new TodoList();
//        $todoList->setName('test');
//        $manager->persist($todoList);

        $manager->flush();
    }
}
