<?php

echo "My ToDo List";


class Todo
{

    public ?DateTime $completed_at = null; // ? devant DateTime pour dire que c'est sois DateTime sois null

    function __construct(
        string $title,
        string $description
    ) {
        $this->title = $title;
        $this->description = $description;
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

    function addTodo(Todo $todo): self
    {
        $this->todos[] = $todo;
        return $this;
    }

    public function searchedTodos(string $title): array
    {
        return $this->filter(fn (Todo $todo) => str_contains($todo->title, $title));
    }
}

$todo2 = new Todo(
    $title = 'Ma todolist \n',
    $description = 'Ma descr\n'
);

fn (Todo $todo) => $todo->isCompleted();

$todos[] = $todo2;


#var_dump($todo->isCompleted());

$toDoList = new TodoList();

$result = $toDoList
    ->addTodo($todo2)
    ->addTodo(new Todo($title = 'Todo1', $description = "descripiton1"))
    ->setAllCompleted()
    ->addTodo(new Todo($title = 'Test2', $description = "description2"))
    ->searchedTodos('Tes');


var_dump($result);
