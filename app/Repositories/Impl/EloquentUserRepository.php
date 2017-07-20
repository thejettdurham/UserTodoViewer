<?php


namespace UserTodo\Repositories\Impl;


use Illuminate\Support\Collection;
use UserTodo\Repositories\Contracts\UserRepository;
use UserTodo\User;

class EloquentUserRepository implements UserRepository
{

    public function getAllUsers(): Collection
    {
        return User::all();
    }

    public function getUserById($id)
    {
        return User::find($id);
    }

    public function addUserFromData($data): User
    {
        // TODO: Implement addUserFromData() method.
    }
}