<?php
require('todo.php');
require('todoList.php');

echo "My ToDo List";

$todo = new Todo(
    $title = "Ma todo",
    $description = "Ma description"
);

$todo->setCompleted();

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
    ->searchedTodos('Te');


var_dump($result);
