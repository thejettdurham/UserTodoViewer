<?php


namespace UserTodo\Repositories\Impl;


use Illuminate\Support\Collection;
use UserTodo\Repositories\Contracts\TodoRepository;
use UserTodo\Todo;
use UserTodo\User;

class EloquentTodoRepository implements TodoRepository
{

    public function getAllTodos(): Collection
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
        $todo = Todo::firstOrNew([
            'id' => $data['id'],
        ]);

        $todo->id        = $data['id'];
        $todo->title     = $data['title'];
        $todo->completed = $data['completed'];

        $user->todos()->save($todo);

        return $todo;
    }
}