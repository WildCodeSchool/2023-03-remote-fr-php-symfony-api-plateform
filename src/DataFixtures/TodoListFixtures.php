<?php

namespace App\DataFixtures;

use App\Entity\TodoList;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TodoListFixtures extends Fixture
{
    public const TODO_LISTS = [
        'Techwatch',
        'Daily Pratice',
        'Learn',
        'Important'
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::TODO_LISTS as $key => $list) {
            $todoList = new TodoList();
            $todoList->setName($list);
            $manager->persist($todoList);
            $this->addReference('todo_list_' . $key  ,$todoList);
        }
        $manager->flush();
    }
}
