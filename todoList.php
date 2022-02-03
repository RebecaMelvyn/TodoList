<?php

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
