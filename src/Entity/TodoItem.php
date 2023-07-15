<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TodoItemRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TodoItemRepository::class)]
#[ApiResource(
    formats: ['json']
)]
class TodoItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups('read:todolist')]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups('read:todolist')]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    #[Groups('read:todolist')]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column]
    #[Groups('read:todolist')]
    private ?bool $done = null;

    #[ORM\ManyToOne(inversedBy: 'todoItems')]
    private ?TodoList $todoList = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function isDone(): ?bool
    {
        return $this->done;
    }

    public function setDone(bool $done): static
    {
        $this->done = $done;

        return $this;
    }

    public function getTodoList(): ?TodoList
    {
        return $this->todoList;
    }

    public function setTodoList(?TodoList $todoList): static
    {
        $this->todoList = $todoList;

        return $this;
    }
}
