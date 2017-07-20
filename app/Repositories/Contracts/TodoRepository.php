<?php
/**
 * Created by PhpStorm.
 * User: jett.durham
 * Date: 7/19/17
 * Time: 8:29 PM
 */

namespace UserTodo\Repositories\Contracts;


use Illuminate\Support\Collection;
use UserTodo\Todo;
use UserTodo\User;

interface TodoRepository
{
    /**
     * Get all todos from the backing store
     *
     * @return Collection of Todo
     */
    public function getAllTodos(): Collection;

    /**
     * Get all todos for a given user from the backing store
     *
     * @param User $user
     * @return mixed
     */
    public function getTodosByUser(User $user);

    /**
     * Get a single todo by id from the backing store
     *
     * @param $id
     * @return mixed
     */
    public function getTodoById($id);

    /**
     * Add to the backing store a todo for a given user from a todo data item
     *
     * @param User $user
     * @param $data
     * @return Todo
     */
    public function addUserTodoFromData(User $user, $data): Todo;
}