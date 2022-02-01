<?php

echo "My ToDo List";


class Todo
{

    public ?DateTime $completed_at = null; // ? devant DateTime pour dire que c'est sois DateTime sois null

    function __construct(
        string $title,
        string $description
    ) {
    }

    public function setCompleted(): self
    {
        $this->completed_at = new DateTime();
        return $this;
    }

    public function isCompleted(): bool
    {
        return $this->completed_at !== null;
    }
}

$todo = new Todo(
    $title = "Ma todo",
    $description = "Ma description"
);



$todo->setCompleted();


class TodoList
{
    public array $todos = [];

    function showCompleted(): array
    {
        return $this->filter(fn (Todo $todo) => $todo->isCompleted());
    }

    function showNotCompleted(): array
    {
        return $this->filter(fn (Todo $todo) => !$todo->isCompleted());
    }

    function setAllCompleted(): self
    {
        foreach ($this->todos as $todo) {
            $todo->setCompleted();
        }
        return $this;
    }

    function filter(callable $filterFunction): array
    {
        return array_filter($this->todos, $filterFunction);
    }

    public function searchedTodos(): array
    {
        return $this->filter(fn (Todo $todo) => !$todo->isCompleted());
    }

    function addTodo(Todo $todo): self
    {
        $this->todos[] = $todo;
        return $this;
    }
}

$todo2 = new Todo(
    $title = 'Ma todolist',
    $description = 'Ma descr'
);

fn (Todo $todo) => $todo->isCompleted();

$todos[] = $todo2;


var_dump($todo->isCompleted());

$toDoList = new TodoList();

$result = $toDoList
    ->addTodo($todo2)
    ->addTodo(new Todo($title = 'Test1', $description = "descripiton1"))
    ->setAllCompleted()
    ->addTodo(new Todo($title = 'Test2', $description = "description2"))
    ->showNotCompleted();


var_dump($toDoList);

var_dump($result);
