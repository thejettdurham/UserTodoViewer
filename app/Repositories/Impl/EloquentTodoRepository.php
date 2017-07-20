<?php


namespace UserTodo\Repositories\Impl;


use UserTodo\Repositories\Contracts\TodoRepository;
use UserTodo\Todo;
use UserTodo\User;

class EloquentTodoRepository implements TodoRepository
{

    public function getAllTodos(): array
    {
        return Todo::all();
    }

    public function getTodosByUser(User $user)
    {
        return $user->todos;
    }

    public function getTodoById($id)
    {
        return Todo::find($id);
    }

    public function addUserTodoFromData(User $user, $data): Todo
    {
        // TODO: Implement addUserTodoFromTodosData() method.
    }
}