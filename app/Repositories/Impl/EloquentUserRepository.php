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
        $user = User::firstOrNew([
            'id' => $data['id'],
        ]);

        $user->name     = $data['name'];
        $user->username = $data['username'];
        $user->email    = $data['email'];
        $user->phone    = $data['phone'];
        $user->website  = $data['website'];

        $user->save();

        return $user;
    }
}