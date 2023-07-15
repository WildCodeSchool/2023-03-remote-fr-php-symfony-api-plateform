<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TodoListRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TodoListRepository::class)]
#[ApiResource(
    formats: ['json'],
    normalizationContext: ['groups' => ['read:todolist']]
)]
class TodoList
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups('read:todolist')]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups('read:todolist')]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'todoList', targetEntity: TodoItem::class)]
    #[Groups('read:todolist')]
    private Collection $todoItems;

    public function __construct()
    {
        $this->todoItems = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, TodoItem>
     */
    public function getTodoItems(): Collection
    {
        return $this->todoItems;
    }

    public function addTodoItem(TodoItem $todoItem): static
    {
        if (!$this->todoItems->contains($todoItem)) {
            $this->todoItems->add($todoItem);
            $todoItem->setTodoList($this);
        }

        return $this;
    }

    public function removeTodoItem(TodoItem $todoItem): static
    {
        if ($this->todoItems->removeElement($todoItem)) {
            // set the owning side to null (unless already changed)
            if ($todoItem->getTodoList() === $this) {
                $todoItem->setTodoList(null);
            }
        }

        return $this;
    }
}
