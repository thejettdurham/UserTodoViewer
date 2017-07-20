<?php


namespace UserTodo\Repositories\Contracts;


use Illuminate\Support\Collection;
use UserTodo\User;

interface UserRepository
{
    /**
     * Get all users from the backing store
     *
     * @return Collection of User
     */
    public function getAllUsers(): Collection;

    /**
     * Get a single user by id from the backing store
     *
     * @param $id
     * @return mixed
     */
    public function getUserById($id);

    /**
     * Add to the backing store a user from a user data item
     *
     * @param $data
     * @return User
     */
    public function addUserFromData($data): User;
}