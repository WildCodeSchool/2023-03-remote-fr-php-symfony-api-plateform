<?php

namespace App\DataFixtures;

use App\Entity\TodoItem;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TodoItemFixtures extends Fixture implements DependentFixtureInterface
{
    public const TODO_ITEMS = [
      ['name' => 'SEO', 'todo_list' => 0],
      ['name' => 'A11Y', 'todo_list' => 0],
      ['name' => 'NoSQL', 'todo_list' => 0],
      ['name' => 'GraphQL', 'todo_list' => 0],
      ['name' => 'Docker', 'todo_list' => 0],
      ['name' => 'Codewars', 'todo_list' => 1],
      ['name' => 'Pure CSS', 'todo_list' => 1],
      ['name' => 'Semantic HTML', 'todo_list' => 1],
      ['name' => 'UnitTest', 'todo_list' => 1],
      ['name' => 'PHP', 'todo_list' => 2],
      ['name' => 'Symfony', 'todo_list' => 2],
      ['name' => 'React', 'todo_list' => 2],
      ['name' => 'NodeJs', 'todo_list' => 2],
      ['name' => 'VueJs', 'todo_list' => 2],
      ['name' => 'Project 3 demo day training', 'todo_list' => 3],
      ['name' => 'Prepare for certification', 'todo_list' => 3],
      ['name' => 'Switch on my webcam for the daily stand up', 'todo_list' => 3],
      ['name' => 'Telling my trainer that I like him after all', 'todo_list' => 3],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::TODO_ITEMS as $item) {
            $todoItem = new TodoItem();
            $todoItem
                ->setName($item['name'])
                ->setTodoList($this->getReference('todo_list_' . $item['todo_list']))
                ->setDone(false);
            $manager->persist($todoItem);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            TodoListFixtures::class
        ];
    }


}
