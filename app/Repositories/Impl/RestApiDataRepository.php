<?php


namespace UserTodo\Repositories\Impl;


use UserTodo\Repositories\Contracts\DataRepository;
use UserTodo\User;

class RestApiDataRepository implements DataRepository
{

    public function getUserData(int $id)
    {
        // TODO: Implement getUserData() method.
    }

    public function getTodosForUser(User $user): array
    {
        // TODO: Implement getTodosForUser() method.
    }
}