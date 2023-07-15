<?php

namespace App\Twig\Components;

use App\Entity\TodoItem;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent()]
final class TodoItemComponent
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public ?TodoItem $todoItem = null;

    #[LiveAction]
    public function toggleDone(EntityManagerInterface $entityManager): void
    {
        $this->todoItem
            ->setUpdatedAt(new \DateTimeImmutable())
            ->setDone(!$this->todoItem->isDone());
        $entityManager->persist($this->todoItem);
        $entityManager->flush();
    }
}
